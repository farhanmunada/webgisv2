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
        COFFEE_SHOP: '#fcd34d',
        ROASTERY: '#b45309',
        SUPPLIER: '#14532d',
        DEFAULT: '#d97706',
        ROUTE: '#8B4513',
        POLYGON_FILL: '#8B4513',
        POLYGON_STROKE: '#703610'
    },
    STORAGE_PATH: '/storage/'
};
