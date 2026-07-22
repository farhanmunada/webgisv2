import { CONFIG } from '../../../core/config.js';
import { State } from '../../../core/state.js';

export const RouteManager = {
    createStartIcon() {
        // Ikon flag start (hijau) - segitiga play / location pin hijau
        const svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 60" width="40" height="50">
            <defs>
                <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
                    <feDropShadow dx="0" dy="2" stdDeviation="2" flood-opacity="0.3"/>
                </filter>
            </defs>
            <path d="M24 2C14.06 2 6 10.06 6 20c0 14.25 18 38 18 38s18-23.75 18-38C42 10.06 33.94 2 24 2z" fill="#16a34a" filter="url(#shadow)"/>
            <circle cx="24" cy="20" r="9" fill="white" opacity="0.95"/>
            <polygon points="20,16 20,24 29,20" fill="#16a34a"/>
        </svg>`;
        return 'data:image/svg+xml;utf-8,' + encodeURIComponent(svg);
    },

    createFinishIcon() {
        // Ikon flag finish (merah)
        const svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 60" width="40" height="50">
            <defs>
                <filter id="shadow2" x="-20%" y="-20%" width="140%" height="140%">
                    <feDropShadow dx="0" dy="2" stdDeviation="2" flood-opacity="0.3"/>
                </filter>
            </defs>
            <path d="M24 2C14.06 2 6 10.06 6 20c0 14.25 18 38 18 38s18-23.75 18-38C42 10.06 33.94 2 24 2z" fill="#dc2626" filter="url(#shadow2)"/>
            <circle cx="24" cy="20" r="9" fill="white" opacity="0.95"/>
            <rect x="18" y="14" width="4" height="4" fill="#dc2626"/>
            <rect x="22" y="14" width="4" height="4" fill="white"/>
            <rect x="18" y="18" width="4" height="4" fill="white"/>
            <rect x="22" y="18" width="4" height="4" fill="#dc2626"/>
            <rect x="18" y="22" width="4" height="4" fill="#dc2626"/>
            <rect x="22" y="22" width="4" height="4" fill="white"/>
        </svg>`;
        return 'data:image/svg+xml;utf-8,' + encodeURIComponent(svg);
    },

    init() {
        State.directionsService = new google.maps.DirectionsService();
        State.directionsRenderer = new google.maps.DirectionsRenderer({
            suppressMarkers: true,
            polylineOptions: { 
                strokeColor: CONFIG.COLORS.ROUTE, 
                strokeWeight: 5, 
                strokeOpacity: 0.8 
            }
        });
        State.directionsRenderer.setMap(State.map);
    },

    calculate(origin, destination) {
        return new Promise((resolve, reject) => {
            const request = { 
                origin: origin, 
                destination: destination, 
                travelMode: google.maps.TravelMode.DRIVING 
            };

            State.directionsService.route(request, (result, status) => {
                if (status === 'OK') {
                    State.directionsRenderer.setDirections(result);

                    // Hapus marker lama jika ada
                    this._clearRouteMarkers();

                    const leg = result.routes[0].legs[0];

                    // Marker START (titik awal / lokasi pengguna)
                    State._startMarker = new google.maps.Marker({
                        position: leg.start_location,
                        map: State.map,
                        icon: {
                            url: this.createStartIcon(),
                            scaledSize: new google.maps.Size(40, 50),
                            anchor: new google.maps.Point(20, 50),
                            labelOrigin: new google.maps.Point(20, 62)
                        },
                        label: {
                            text: 'Lokasi Saya',
                            color: '#15803d',
                            fontSize: '10px',
                            fontWeight: '700',
                            fontFamily: 'Inter, sans-serif'
                        },
                        title: 'Titik Awal',
                        zIndex: 100
                    });

                    // Marker FINISH (titik tujuan / lokasi UMKM)
                    State._finishMarker = new google.maps.Marker({
                        position: leg.end_location,
                        map: State.map,
                        icon: {
                            url: this.createFinishIcon(),
                            scaledSize: new google.maps.Size(40, 50),
                            anchor: new google.maps.Point(20, 50),
                            labelOrigin: new google.maps.Point(20, 62)
                        },
                        label: {
                            text: 'Tujuan',
                            color: '#dc2626',
                            fontSize: '10px',
                            fontWeight: '700',
                            fontFamily: 'Inter, sans-serif'
                        },
                        title: 'Titik Tujuan',
                        zIndex: 100
                    });

                    resolve(leg);
                } else {
                    reject(new Error("Routing failed: " + status));
                }
            });
        });
    },

    _clearRouteMarkers() {
        if (State._startMarker) {
            State._startMarker.setMap(null);
            State._startMarker = null;
        }
        if (State._finishMarker) {
            State._finishMarker.setMap(null);
            State._finishMarker = null;
        }
    },

    clear() {
        if (State.directionsRenderer) {
            State.directionsRenderer.setDirections({ routes: [] });
        }
        this._clearRouteMarkers();
        State.currentUmkmPos = null;
    }
};
