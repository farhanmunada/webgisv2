import { CONFIG } from '../../../core/config.js';
import { State } from '../../../core/state.js';

export const MapManager = {
    init() {
        const urlParams = new URLSearchParams(window.location.search);
        const lat = parseFloat(urlParams.get('lat'));
        const lng = parseFloat(urlParams.get('lng'));

        const center = (lat && lng) ? { lat, lng } : CONFIG.MAP.CENTER;
        const zoom = (lat && lng) ? 18 : CONFIG.MAP.ZOOM;

        State.map = new google.maps.Map(document.getElementById("map"), {
            zoom: zoom,
            center: center,
            styles: CONFIG.MAP.STYLES,
            disableDefaultUI: true,
            gestureHandling: 'greedy'
        });

        if (window.MAP_CONFIG && window.MAP_CONFIG.geojsonUrl) {
            State.map.data.loadGeoJson(window.MAP_CONFIG.geojsonUrl);
        }

        return State.map;
    }
};
