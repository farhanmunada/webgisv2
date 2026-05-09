import { CONFIG } from '../../../core/config.js';
import { State } from '../../../core/state.js';

export const RouteManager = {
    init() {
        State.directionsService = new google.maps.DirectionsService();
        State.directionsRenderer = new google.maps.DirectionsRenderer({
            suppressMarkers: false,
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
                    resolve(result.routes[0].legs[0]);
                } else {
                    reject(new Error("Routing failed: " + status));
                }
            });
        });
    },

    clear() {
        if (State.directionsRenderer) {
            State.directionsRenderer.setDirections({ routes: [] });
        }
        State.currentUmkmPos = null;
    }
};
