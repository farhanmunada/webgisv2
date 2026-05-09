import { CONFIG } from '../../../core/config.js';
import { State } from '../../../core/state.js';

export const MarkerManager = {
    createIcon(categoryName) {
        let color = CONFIG.COLORS.DEFAULT;
        const cat = categoryName ? categoryName.toLowerCase() : '';

        if (cat.includes('coffee shop') || cat.includes('coffeeshop')) {
            color = CONFIG.COLORS.COFFEE_SHOP;
        } else if (cat.includes('roastery')) {
            color = CONFIG.COLORS.ROASTERY;
        } else if (cat.includes('suplier') || cat.includes('supplier')) {
            color = CONFIG.COLORS.SUPPLIER;
        }

        const svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="${color}" stroke="#ffffff" stroke-width="1.5" width="36" height="36"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/></svg>`;
        return 'data:image/svg+xml;utf-8,' + encodeURIComponent(svg);
    },

    render(markersData, onMarkerClick) {
        markersData.forEach(umkm => {
            const lat = parseFloat(umkm.latitude);
            const lng = parseFloat(umkm.longitude);
            if (isNaN(lat) || isNaN(lng)) return;

            const catName = umkm.category ? umkm.category.nama_kategori : 'Unknown';
            const marker = new google.maps.Marker({
                position: { lat, lng },
                map: State.map,
                title: umkm.nama_umkm,
                icon: {
                    url: this.createIcon(catName),
                    scaledSize: new google.maps.Size(36, 36),
                    anchor: new google.maps.Point(18, 36)
                }
            });

            State.heatmapData.push(new google.maps.LatLng(lat, lng));
            marker.addListener("click", () => onMarkerClick(umkm, marker));
            State.markers.push({ marker, category: catName });
        });
    },

    filter(categoryName) {
        State.markers.forEach(m => {
            m.marker.setVisible(categoryName === 'all' || m.category === categoryName);
        });
    }
};
