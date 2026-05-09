/**
 * Entry Point WebGIS Kopi Temanggung
 * Menggunakan Clean Architecture (Core, Services, Features)
 */

import { WebGisApp } from './features/webgis/main.js';

// Callback Global untuk Google Maps API
window.initMap = () => {
    WebGisApp.init();
};

// Fallback jika API Google Maps termuat sebelum atau setelah script ini
if (typeof google !== 'undefined' && google.maps) {
    window.initMap();
} else {
    window.addEventListener('load', () => {
        if (typeof google !== 'undefined' && google.maps) {
            window.initMap();
        }
    });
}
