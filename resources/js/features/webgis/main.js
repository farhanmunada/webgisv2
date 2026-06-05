import { State } from '../../core/state.js';
import { ApiService } from '../../services/api.service.js';
import { LocationService } from '../../services/location.service.js';
import { MapManager } from './map/map-manager.js';
import { MarkerManager } from './map/marker-manager.js';
import { PolygonManager } from './map/polygon-manager.js';
import { RouteManager } from './map/route-manager.js';
import { BottomSheet } from './ui/bottom-sheet.js';
import { Chips } from './ui/chips.js';
import { RoutePanel } from './ui/route-panel.js';
import { Search } from './ui/search.js';
import { Sidebar } from './ui/sidebar.js';

export const WebGisApp = {
    async init() {
        // 1. Inisialisasi Peta & Manager
        MapManager.init();
        PolygonManager.init();
        RouteManager.init();
        Sidebar.init();

        // 2. Load Data Awal
        await this.loadInitialData();

        // 3. Setup Interaksi UI & Event
        this.setupEventListeners();

        // 4. Inisialisasi Search
        Search.init((val) => MarkerManager.filter(val));

        // 5. Cek Persistence State (Setelah Login)
        this.handlePersistence();
    },

    handlePersistence() {
        const pendingFeature = localStorage.getItem('pending_feature');
        if (pendingFeature && window.AUTH_CONFIG.isAuthenticated) {
            localStorage.removeItem('pending_feature');

            if (pendingFeature === 'polygon') {
                document.getElementById('polygon-toggle')?.click();
            } else if (pendingFeature.startsWith('route_')) {
                const umkmId = pendingFeature.split('_')[1];
                const umkm = State.rawMarkers.find(m => m.id == umkmId);
                if (umkm) {
                    this.handleMarkerClick(umkm);
                    setTimeout(() => this.handleRouteClick(), 1000);
                }
            }
        }
    },

    checkAuth(featureId) {
        if (!window.AUTH_CONFIG.isAuthenticated) {
            window.showToast('Silakan login terlebih dahulu untuk mengakses fitur ini.', 'warning');
            localStorage.setItem('pending_feature', featureId);
            setTimeout(() => {
                window.location.href = '/login';
            }, 800);
            return false;
        }
        return true;
    },

    async loadInitialData() {
        try {
            // Fetch public data
            const [markers, stats] = await Promise.all([
                ApiService.fetchMarkers(),
                ApiService.fetchCategories()
            ]);

            State.rawMarkers = markers;
            MarkerManager.render(markers, (umkm) => this.handleMarkerClick(umkm));
            Chips.render(stats.by_category, (cat) => MarkerManager.filter(cat));

            // Fetch optional protected data
            if (window.AUTH_CONFIG.isAuthenticated) {
                try {
                    const polygons = await ApiService.fetchPolygons();
                    console.log("Harvest data loaded:", polygons.length, "items");
                    polygons.forEach(item => { 
                        if (item.kecamatan) {
                            const key = item.kecamatan.toString().toUpperCase().trim();
                            State.harvestData[key] = item; 
                        }
                    });
                } catch (err) {
                    console.warn("Optional polygon fetch failed:", err);
                }
            }

        } catch (err) {
            console.error("Critical Initialization Error:", err);
        }
    },

    handleMarkerClick(umkm) {
        State.map.panTo({ lat: parseFloat(umkm.latitude), lng: parseFloat(umkm.longitude) });
        window.setTimeout(() => { State.map.panBy(0, 100); }, 300);
        State.currentUmkmId = umkm.id;
        State.currentUmkmPos = { lat: parseFloat(umkm.latitude), lng: parseFloat(umkm.longitude) };

        BottomSheet.open(umkm, () => this.handleRouteClick());
    },

    async handleRouteClick() {
        if (!this.checkAuth('route_' + State.currentUmkmId)) return;

        try {
            if (!State.userLocation) {
                State.userLocation = await LocationService.getCurrentPosition();
            }
            const leg = await RouteManager.calculate(State.userLocation, State.currentUmkmPos);
            BottomSheet.close();
            RoutePanel.show(leg.distance.text, leg.duration.text);
        } catch (err) {
            alert("Gagal memuat rute: " + err.message);
        }
    },

    setupEventListeners() {
        // Klik Peta -> Tutup UI yang terbuka
        State.map.addListener('click', () => {
            BottomSheet.close();
            if (window.polygonInfoWindow) window.polygonInfoWindow.close();
        });

        // Interaksi Poligon
        State.map.data.addListener('click', (e) => {
            if (!this.checkAuth('polygon')) return;
            PolygonManager.showInfo(e);
        });

        // Helper to update marker visibility and the toggle button UI state
        const updateMarkerToggleUI = (visible) => {
            const btn = document.getElementById('marker-toggle');
            if (!btn) return;
            State.isMarkersVisible = visible;
            btn.classList.toggle('bg-[#8B4513]', visible);
            btn.classList.toggle('text-white', visible);
            btn.classList.toggle('text-slate-700', !visible);
            MarkerManager.updateMarkerVisibility();
        };

        // Helper to slide-out/fade-out search bar and category filters
        const updateSearchHeaderVisibility = () => {
            const container = document.getElementById('search-header-container');
            if (!container) return;
            const hide = State.polygonLayerActive;
            if (hide) {
                container.classList.remove('translate-y-0', 'opacity-100');
                container.classList.add('-translate-y-24', 'opacity-0');
            } else {
                container.classList.remove('-translate-y-24', 'opacity-0');
                container.classList.add('translate-y-0', 'opacity-100');
            }
        };

        // Marker Toggle Click (Manual override button requested by user)
        document.getElementById('marker-toggle')?.addEventListener('click', () => {
            const visible = !State.isMarkersVisible;
            updateMarkerToggleUI(visible);
        });

        // Polygon Toggle
        document.getElementById('polygon-toggle')?.addEventListener('click', (e) => {
            if (!this.checkAuth('polygon')) return;

            const active = !State.polygonLayerActive;
            PolygonManager.toggle(active);
            e.currentTarget.classList.toggle('bg-[#8B4513]', active);
            e.currentTarget.classList.toggle('text-white', active);
            e.currentTarget.classList.toggle('text-slate-700', !active);
            
            if (active) {
                // Auto-hide markers when polygon opens
                updateMarkerToggleUI(false);
            } else {
                updateMarkerToggleUI(true);
            }

            updateSearchHeaderVisibility();
        });

        // Tombol Lokasi Saya
        document.getElementById('location-btn')?.addEventListener('click', async () => {
            try {
                State.userLocation = await LocationService.getCurrentPosition();
                State.map.setCenter(State.userLocation);
                State.map.setZoom(15);
                new google.maps.Marker({
                    position: State.userLocation,
                    map: State.map,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE, scale: 8, fillColor: '#3b82f6',
                        fillOpacity: 1, strokeColor: 'white', strokeWeight: 2
                    }
                });
            } catch (err) {
                alert("Gagal mengambil lokasi: " + err.message);
            }
        });

        // Tombol Bersihkan Rute
        document.getElementById('clear-route-btn')?.addEventListener('click', () => {
            RouteManager.clear();
            RoutePanel.hide();
        });

        // Chip Filter "Semua"
        document.querySelector('.chip[data-category="all"]')?.addEventListener('click', (e) => {
            Chips.setActive(e.target);
            MarkerManager.filter('all');
        });

        // Swipe Bottom Sheet (Mobile)
        const handle = document.getElementById('sheet-handle');
        if (handle) {
            let startY;
            handle.addEventListener('touchstart', e => { startY = e.touches[0].clientY; }, { passive: true });
            handle.addEventListener('touchmove', e => {
                if (e.touches[0].clientY - startY > 50) BottomSheet.close();
            }, { passive: true });
        }

        // Tombol Tutup Bottom Sheet
        document.getElementById('close-sheet')?.addEventListener('click', () => BottomSheet.close());
    }
};
