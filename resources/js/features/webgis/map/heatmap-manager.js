import { State } from '../../../core/state.js';

export const HeatmapManager = {
    init(google) {
        State.heatmapLayer = new google.maps.visualization.HeatmapLayer({
            data: State.heatmapData,
            radius: 52,
            opacity: 0.8,
            gradient: [
                'rgba(234, 88, 12, 0)', 'rgba(234, 88, 12, 0.2)', 'rgba(234, 88, 12, 0.4)',
                'rgba(234, 88, 12, 0.6)', 'rgba(234, 88, 12, 0.8)', 'rgba(234, 88, 12, 1)'
            ]
        });
    },

    toggle(active) {
        State.isHeatmapActive = active;
        State.heatmapLayer.setMap(active ? State.map : null);
    }
};
