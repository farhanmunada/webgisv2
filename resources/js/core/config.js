export const CONFIG = {
    MAP: {
        CENTER: { lat: -7.318, lng: 110.176 },
        ZOOM: 12,
        STYLES: [
            { "featureType": "poi", "stylers": [{ "visibility": "off" }] },
            { "featureType": "transit", "stylers": [{ "visibility": "off" }] },
            { "featureType": "road", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }
        ],
    },
    COLORS: {
        COFFEE_SHOP: '#c47c00',
        ROASTERY: '#78350f',
        SUPPLIER: '#14532d',
        DEFAULT: '#92400e',
        ROUTE: '#8B4513',
        POLYGON_FILL: '#8B4513',
        POLYGON_STROKE: '#703610'
    },
    STORAGE_PATH: '/storage/'
};
