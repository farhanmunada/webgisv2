import { CONFIG } from '../../../core/config.js';
import { Formatter } from '../utils/formatter.js';

export const BottomSheet = {
    element: document.getElementById('bottom-sheet'),

    open(umkm, onRouteClick) {
        if (!this.element) return;

        // Photo
        const photoContainer = document.getElementById('bs-photo-container');
        const photoImg = document.getElementById('bs-photo');
        if (umkm.foto) {
            photoImg.src = CONFIG.STORAGE_PATH + umkm.foto;
            photoContainer.classList.remove('hidden');
        } else {
            photoContainer.classList.add('hidden');
        }

        // Basic Info
        document.getElementById('bs-title').textContent = umkm.nama_umkm;
        document.getElementById('bs-umkm-detail-link').href = '/umkm/' + umkm.id;
        document.getElementById('bs-category').textContent = umkm.category ? umkm.category.nama_kategori : "Kategori Kopi";
        document.getElementById('bs-address').textContent = umkm.alamat;
        document.getElementById('bs-description').textContent = umkm.deskripsi || "UMKM ini belum menambahkan deskripsi.";

        // Products
        this.renderProducts(umkm.products);

        // Route Button
        const routeBtn = document.getElementById('bs-route-btn');
        if (routeBtn) {
            const newRouteBtn = routeBtn.cloneNode(true);
            routeBtn.parentNode.replaceChild(newRouteBtn, routeBtn);
            newRouteBtn.addEventListener('click', onRouteClick);
        }

        this.element.classList.add('open');
    },

    close() {
        if (this.element) this.element.classList.remove('open');
    },

    renderProducts(products) {
        const container = document.getElementById('bs-products');
        if (!container) return;
        container.innerHTML = '';

        if (products && products.length > 0) {
            // Tampilkan maksimal 3 produk terbaru
            const displayProducts = products.slice(0, 3);
            
            displayProducts.forEach(p => {
                const imgUrl = p.foto_produk ? CONFIG.STORAGE_PATH + p.foto_produk : '';
                const imgDiv = p.foto_produk 
                    ? `<img src="${imgUrl}" class="w-full h-full object-cover">`
                    : `<div class="bg-slate-50 w-full h-full flex items-center justify-center"><svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2"></path></svg></div>`;
                
                container.innerHTML += `
                    <a href="/katalog/${p.id}" class="min-w-[140px] max-w-[140px] bg-white border border-slate-100 rounded-2xl overflow-hidden shadow-sm flex-shrink-0 hover:shadow-md hover:border-amber-200 transition-all block">
                        <div class="h-24 w-full overflow-hidden bg-slate-50">${imgDiv}</div>
                        <div class="p-2.5">
                            <h4 class="text-[10px] font-bold text-slate-900 truncate leading-tight">${p.nama_produk}</h4>
                            <p class="text-xs font-black text-amber-700 mt-1">${Formatter.currency(p.harga)}</p>
                        </div>
                    </a>
                `;
            });
        } else {
            container.innerHTML = `<p class="text-xs text-slate-400 italic px-1">Belum ada katalog produk</p>`;
        }
    }
};
