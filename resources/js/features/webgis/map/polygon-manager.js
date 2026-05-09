import { CONFIG } from '../../../core/config.js';
import { State } from '../../../core/state.js';

export const PolygonManager = {
    init() {
        State.map.data.setStyle({
            fillColor: CONFIG.COLORS.POLYGON_FILL,
            fillOpacity: 0.25,
            strokeColor: CONFIG.COLORS.POLYGON_STROKE,
            strokeWeight: 1.5,
            visible: false
        });
    },

    toggle(active) {
        State.polygonLayerActive = active;
        State.map.data.setStyle({
            fillColor: CONFIG.COLORS.POLYGON_FILL,
            fillOpacity: 0.25,
            strokeColor: CONFIG.COLORS.POLYGON_STROKE,
            strokeWeight: 1.5,
            visible: active
        });
    },

    showInfo(event) {
        const districtName = event.feature.getProperty('WADMKC') || event.feature.getProperty('KECAMATAN') || "";
        const districtKey = districtName.toString().toUpperCase().trim();
        const data = State.harvestData[districtKey];
        const info = data ? `Robusta: <b>${data.hasil_robusta} Ton</b><br>Arabika: <b>${data.hasil_arabika} Ton</b>` : "Data belum tersedia";
        
        if (window.polygonInfoWindow) window.polygonInfoWindow.close();
        window.polygonInfoWindow = new google.maps.InfoWindow({
            content: `<div style="padding:4px;min-width:140px;"><h4 style="font-weight:bold;margin:0 0 4px 0; color:#1e293b;">Kec. ${districtName}</h4><p style="margin:0;font-size:13px;color:#64748b;">${info}</p></div>`,
            position: event.latLng
        });
        window.polygonInfoWindow.open(State.map);
    }
};
