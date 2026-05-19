import { State } from '../../../core/state.js';

export const HeatmapManager = {
    init(google) {
        State.heatmapLayer = new google.maps.visualization.HeatmapLayer({
            data: State.heatmapData,
            radius: State.heatmapRadius,
            opacity: State.heatmapOpacity,
            gradient: [
                'rgba(102, 255, 0, 0)',
                'rgba(102, 255, 0, 1)',
                'rgba(147, 255, 0, 1)',
                'rgba(193, 255, 0, 1)',
                'rgba(238, 255, 0, 1)',
                'rgba(244, 227, 0, 1)',
                'rgba(249, 198, 0, 1)',
                'rgba(255, 170, 0, 1)',
                'rgba(255, 113, 0, 1)',
                'rgba(255, 57, 0, 1)',
                'rgba(255, 0, 0, 1)'
            ]
        });
    },

    toggle(active) {
        State.isHeatmapActive = active;
        State.heatmapLayer.setMap(active ? State.map : null);
    },

    setRadius(radius) {
        State.heatmapRadius = radius;
        if (State.heatmapLayer) {
            State.heatmapLayer.set('radius', radius);
        }
    },

    setOpacity(opacity) {
        State.heatmapOpacity = opacity;
        if (State.heatmapLayer) {
            State.heatmapLayer.set('opacity', opacity);
        }
    }
};
