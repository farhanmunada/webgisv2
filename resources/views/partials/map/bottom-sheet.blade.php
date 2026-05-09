<div id="bottom-sheet" class="bottom-sheet fixed bottom-0 left-0 right-0 z-20 bg-white rounded-t-3xl shadow-[0_-10px_40px_rgba(0,0,0,0.15)] w-full max-w-md mx-auto sm:max-w-md sm:left-4 sm:right-auto sm:bottom-4 sm:rounded-2xl max-h-[85vh] flex flex-col pointer-events-auto">
    <!-- Drag Handle Indicator -->
    <div class="w-full flex justify-center py-3 cursor-grab" id="sheet-handle">
        <div class="w-12 h-1.5 bg-slate-300 rounded-full"></div>
    </div>

    <div class="px-5 pb-6 overflow-y-auto hide-scrollbar flex-1 relative">
        <button id="close-sheet" class="absolute top-0 right-0 p-2 bg-slate-100 rounded-full text-slate-500 hover:bg-slate-200 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>

        <!-- Foto -->
        <div id="bs-photo-container" class="w-full h-48 bg-slate-100 rounded-xl mb-4 overflow-hidden hidden mt-2">
            <img id="bs-photo" src="" alt="Foto UMKM" class="w-full h-full object-cover">
        </div>

        <!-- Header -->
        <div class="mt-2 pr-10 relative">
            <span id="bs-category" class="text-xs font-semibold px-2.5 py-1 bg-[#FDF5E6] text-[#8B4513] rounded-md inline-block mb-2">Kategori</span>
            <div class="flex items-center justify-between">
                <h2 id="bs-title" class="text-2xl font-bold text-black leading-tight">Nama UMKM</h2>
                <a id="bs-umkm-detail-link" href="#" class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-500 hover:bg-[#8B4513] hover:text-white transition-all ml-2 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </a>
            </div>
            <div class="flex items-start text-black/70 mt-2">
                <svg class="w-5 h-5 mr-1.5 mt-0.5 flex-shrink-0 text-black/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <p id="bs-address" class="text-sm leading-snug">Alamat Lengkap</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex mt-6">
            <button id="bs-route-btn" class="w-full bg-[#8B4513] hover:bg-[#703610] text-white py-3 rounded-xl font-semibold flex items-center justify-center transition shadow-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-5.446a2 2 0 010-2.828l5.447-5.446m1.06 1.06l5.447 5.446a2 2 0 010 2.828l-5.447 5.446M12 21V3"></path></svg> 
                Lihat Rute
            </button>
        </div>

        <!-- Information Section -->
        <div class="mt-6 border-t border-slate-100 pt-5">
            <h3 class="font-bold text-black mb-3">Informasi UMKM</h3>
            <p id="bs-description" class="text-sm text-black/80 leading-relaxed bg-slate-50 p-3 rounded-lg border border-slate-100">
                Deskripsi UMKM akan muncul di sini.
            </p>
        </div>

        <!-- Products Section -->
        <div class="mt-6 border-t border-slate-100 pt-5">
            <h3 class="font-bold text-black mb-4 flex items-center justify-between">
                Katalog Produk
            </h3>
            <div id="bs-products" class="flex overflow-x-auto hide-scrollbar space-x-3 pb-2 -mx-5 px-5">
                <!-- Product Items will be injected here -->
            </div>
        </div>
    </div>
</div>
