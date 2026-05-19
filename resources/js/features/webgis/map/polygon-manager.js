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

        // Count UMKMs in this specific district
        let totalUmkms = 0;
        let coffeeShopCount = 0;
        let roasteryCount = 0;
        let supplierCount = 0;

        const markers = State.rawMarkers || [];
        markers.forEach(umkm => {
            const umkmKec = umkm.kecamatan ? umkm.kecamatan.toString().toUpperCase().trim() : '';
            if (umkmKec === districtKey) {
                totalUmkms++;
                const cat = umkm.category ? umkm.category.nama_kategori.toLowerCase() : '';
                if (cat.includes('coffee shop') || cat.includes('coffeeshop')) {
                    coffeeShopCount++;
                } else if (cat.includes('roastery')) {
                    roasteryCount++;
                } else if (cat.includes('suplier') || cat.includes('supplier')) {
                    supplierCount++;
                }
            }
        });

        const harvestInfo = data 
            ? `<div style="background: rgba(139, 69, 19, 0.04); border: 1px solid rgba(139, 69, 19, 0.08); border-radius: 14px; padding: 8px 12px; margin-bottom: 8px;">
                <span style="font-size: 10px; text-transform: uppercase; font-weight: 900; color: #8B4513; display: flex; align-items: center; gap: 4px; margin-bottom: 4px; letter-spacing: 0.8px;">
                    <svg style="width: 12px; height: 12px; color: #8B4513; flex-shrink: 0;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18M12 3a9 9 0 00-9 9m9-9a9 9 0 019 9"/></svg>
                    Hulu (Hasil Panen)
                </span>
                <div style="font-size: 12px; color: #475569; display: flex; flex-direction: column; gap: 2px;">
                    <span style="display: flex; justify-content: space-between; align-items: center;">
                        <span>Robusta</span>
                        <b style="color: #0f172a;">${data.hasil_robusta} Ton</b>
                    </span>
                    <span style="display: flex; justify-content: space-between; align-items: center;">
                        <span>Arabika</span>
                        <b style="color: #0f172a;">${data.hasil_arabika} Ton</b>
                    </span>
                </div>
               </div>` 
            : `<div style="background: rgba(148, 163, 184, 0.04); border: 1px solid rgba(148, 163, 184, 0.1); border-radius: 14px; padding: 8px 12px; margin-bottom: 8px;">
                <span style="font-size: 10px; text-transform: uppercase; font-weight: 900; color: #64748b; display: flex; align-items: center; gap: 4px; margin-bottom: 4px; letter-spacing: 0.8px;">
                    <svg style="width: 12px; height: 12px; color: #64748b; flex-shrink: 0;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18M12 3a9 9 0 00-9 9m9-9a9 9 0 019 9"/></svg>
                    Hulu (Hasil Panen)
                </span>
                <span style="display: block; font-size: 11px; color: #94a3b8; font-style: italic; text-align: center; padding: 4px 0;">Data panen belum tersedia</span>
               </div>`;

        const umkmInfo = `
            <div style="background: rgba(37, 99, 235, 0.04); border: 1px solid rgba(37, 99, 235, 0.08); border-radius: 14px; padding: 8px 12px;">
                <span style="font-size: 10px; text-transform: uppercase; font-weight: 900; color: #2563eb; display: flex; align-items: center; gap: 4px; margin-bottom: 4px; letter-spacing: 0.8px;">
                    <svg style="width: 12px; height: 12px; color: #2563eb; flex-shrink: 0;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72M6.75 18h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .414.336.75.75.75z"/></svg>
                    Hilir (UMKM Kopi)
                </span>
                <div style="font-size: 12px; color: #475569; display: flex; flex-direction: column; gap: 3px;">
                    <span style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px dashed rgba(37, 99, 235, 0.1); padding-bottom: 4px; margin-bottom: 2px;">
                        <span style="font-weight: 700; color: #0f172a;">Total Terdaftar</span>
                        <b style="color: #2563eb; font-weight: 900; font-size: 13px;">${totalUmkms} UMKM</b>
                    </span>
                    <div style="font-size: 11px; color: #64748b; display: flex; flex-direction: column; gap: 2px;">
                        <span style="display: flex; justify-content: space-between;">
                            <span>- Coffee Shop</span>
                            <b style="color: #334155;">${coffeeShopCount}</b>
                        </span>
                        <span style="display: flex; justify-content: space-between;">
                            <span>- Roastery</span>
                            <b style="color: #334155;">${roasteryCount}</b>
                        </span>
                        <span style="display: flex; justify-content: space-between;">
                            <span>- Supplier</span>
                            <b style="color: #334155;">${supplierCount}</b>
                        </span>
                    </div>
                </div>
            </div>
        `;

        const contentString = `
            <div style="padding: 4px; min-width: 210px; font-family: 'Outfit', 'Inter', system-ui, -apple-system, sans-serif;">
                <h4 style="font-weight: 900; margin: 0 0 10px 0; font-size: 15px; color: #0f172a; border-bottom: 2px solid #f1f5f9; padding-bottom: 6px; display: flex; align-items: center; gap: 6px;">
                    <svg style="width: 14px; height: 14px; color: #1e293b; flex-shrink: 0;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                    <span style="background: linear-gradient(135deg, #1e293b, #475569); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Kec. ${districtName}</span>
                </h4>
                ${harvestInfo}
                ${umkmInfo}
            </div>
        `;
        
        if (window.polygonInfoWindow) window.polygonInfoWindow.close();
        window.polygonInfoWindow = new google.maps.InfoWindow({
            content: contentString,
            position: event.latLng
        });
        window.polygonInfoWindow.open(State.map);
    }
};
