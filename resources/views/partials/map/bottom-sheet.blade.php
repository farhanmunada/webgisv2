<div id="bottom-sheet" class="bottom-sheet fixed bottom-0 left-0 right-0 z-20 bg-white rounded-t-3xl shadow-[0_-10px_40px_rgba(0,0,0,0.12)] w-full max-w-md mx-auto sm:max-w-sm sm:left-4 sm:right-auto sm:bottom-4 sm:rounded-2xl max-h-[85vh] sm:max-h-[80vh] flex flex-col pointer-events-auto">
    <!-- Header Handle Area -->
    <div class="w-full flex justify-between items-center px-5 py-3.5 border-b border-slate-100/50 shrink-0 select-none">
        <div class="w-8 sm:hidden"></div>
        <div class="w-12 h-1.5 bg-slate-300 rounded-full cursor-grab sm:hidden" id="sheet-handle"></div>
        <span class="hidden sm:inline-block font-black text-slate-850 text-xs uppercase tracking-wider">Detail Informasi</span>
        <button id="close-sheet" class="w-8 h-8 flex items-center justify-center bg-slate-50 hover:bg-slate-100 rounded-full text-slate-400 hover:text-slate-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <div class="px-5 py-5 overflow-y-auto hide-scrollbar flex-1 relative">
        <!-- Foto -->
        <div id="bs-photo-container" class="w-full h-44 bg-slate-50 rounded-2xl mb-4 overflow-hidden hidden border border-slate-100 shadow-inner">
            <img id="bs-photo" src="" alt="Foto UMKM" class="w-full h-full object-cover">
        </div>

        <!-- Header -->
        <div class="relative">
            <div class="flex items-center gap-2 mb-2">
                <span id="bs-category" class="text-[9px] font-black uppercase tracking-wider px-2 py-0.5 bg-amber-50 text-[#8B4513] rounded-md border border-amber-100/60">Kategori</span>
            </div>
            <div class="flex items-start justify-between gap-3">
                <h2 id="bs-title" class="text-xl sm:text-2xl font-black text-slate-900 leading-tight">Nama UMKM</h2>
                <a id="bs-umkm-detail-link" href="#" class="w-9 h-9 bg-amber-50 hover:bg-amber-100 text-[#8B4513] rounded-xl flex items-center justify-center transition-all shrink-0 border border-amber-100/50 shadow-sm" title="Lihat Detail Profil">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
            <div class="flex items-start text-slate-500 gap-1.5 mt-2.5">
                <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <p id="bs-address" class="text-xs sm:text-sm font-semibold leading-relaxed">Alamat Lengkap</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-5">
            <button id="bs-route-btn" class="w-full bg-[#8B4513] hover:bg-[#703610] text-white py-3 rounded-xl sm:rounded-2xl text-xs sm:text-sm font-black flex items-center justify-center transition shadow-lg shadow-amber-900/20 uppercase tracking-widest gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 20l-5.447-5.446a2 2 0 010-2.828l5.447-5.446m1.06 1.06l5.447 5.446a2 2 0 010 2.828l-5.447 5.446M12 21V3"></path></svg> 
                Lihat Rute Jalan
            </button>
        </div>

        <!-- Information Section -->
        <div class="mt-6 border-t border-slate-100 pt-5">
            <h3 class="text-[10px] font-black uppercase text-slate-400 tracking-wider mb-2">Tentang Usaha</h3>
            <p id="bs-description" class="text-xs sm:text-sm text-slate-600 leading-relaxed bg-slate-50/50 p-3 sm:p-4 rounded-xl border border-slate-100 font-medium">
                Deskripsi UMKM akan muncul di sini.
            </p>
        </div>

        <!-- Products Section -->
        <div class="mt-6 border-t border-slate-100 pt-5">
            <h3 class="text-[10px] font-black uppercase text-slate-400 tracking-wider mb-3">
                Produk Unggulan
            </h3>
            <div id="bs-products" class="flex overflow-x-auto hide-scrollbar space-x-3 pb-2 -mx-5 px-5">
                <!-- Product Items will be injected here -->
            </div>
        </div>
    </div>
</div>
