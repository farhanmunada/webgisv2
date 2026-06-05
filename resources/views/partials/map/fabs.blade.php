<!-- Bottom Right: Sleek Unified Vertical Map Layers & Utilities Dock -->
<div class="absolute right-4 bottom-8 z-10 flex flex-col items-center space-y-3 pointer-events-none" style="margin-bottom: max(env(safe-area-inset-bottom), 16px);">
    <!-- My Location FAB (Floats above the vertical layers dock) -->
    <button id="location-btn" class="pointer-events-auto glass-panel w-10 h-10 rounded-full flex items-center justify-center text-black hover:text-[#8B4513] hover:bg-white transition-all duration-300 shadow-lg" title="Lokasi Saya">
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm8.94 3c-.46-4.17-3.77-7.48-7.94-7.94V1h-2v2.06C6.83 3.52 3.52 6.83 3.06 11H1v2h2.06c.46 4.17 3.77 7.48 7.94 7.94V23h2v-2.06c4.17-.46 7.48-3.77 7.94-7.94H23v-2h-2.06zM12 19c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z"/></svg>
    </button>

    <!-- Unified Vertical Map Layers dock -->
    <div class="pointer-events-auto glass-panel flex flex-col items-center p-1 rounded-2xl shadow-xl border border-white/40 space-y-1">
        <!-- Polygon Toggle -->
        <button id="polygon-toggle" class="w-9 h-9 rounded-xl flex items-center justify-center text-slate-700 hover:text-[#8B4513] hover:bg-slate-100/50 transition-all duration-300" title="Tampilkan Area Panen">
            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path></svg>
        </button>

        <!-- Divider line -->
        <div class="w-5 h-px bg-slate-200/50"></div>

        <!-- Marker Toggle -->
        <button id="marker-toggle" class="w-9 h-9 rounded-xl flex items-center justify-center bg-[#8B4513] text-white hover:bg-[#703610] transition-all duration-300" title="Tampilkan/Sembunyikan Pin UMKM">
            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
        </button>
    </div>
</div>
