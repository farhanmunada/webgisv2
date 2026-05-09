<div id="route-info-panel" class="fixed bottom-24 left-4 right-4 z-20 bg-white rounded-2xl shadow-2xl p-4 max-w-sm mx-auto border border-slate-100 hidden transform transition-transform duration-300">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <div class="w-10 h-10 bg-[#FDF5E6] rounded-full flex items-center justify-center text-[#8B4513]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </div>
            <div>
                <p class="text-[10px] text-black/40 font-bold uppercase tracking-wider">Estimasi Perjalanan</p>
                <p class="text-sm font-bold text-black"><span id="route-distance">-</span> • <span id="route-duration">-</span></p>
            </div>
        </div>
        <button id="clear-route-btn" class="bg-black text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-slate-800 transition">
            Hapus Rute
        </button>
    </div>
</div>
