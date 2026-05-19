<div id="search-header-container" class="absolute top-0 left-0 right-0 z-10 px-4 pt-4 sm:pt-6 pointer-events-none transition-all duration-300 transform translate-y-0 opacity-100">
    <div class="max-w-md mx-auto pointer-events-auto">
        <!-- Search Bar -->
        <div class="glass-panel flex items-center rounded-full px-4 py-3">
            <button id="menu-btn" class="text-slate-500 hover:text-slate-800 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <input type="text" id="search-input" placeholder="Cari UMKM Kopi..." class="flex-1 bg-transparent border-none focus:ring-0 px-3 text-black placeholder-slate-400 outline-none">
            
            @if (Route::has('login'))
                <div class="flex items-center ml-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="w-8 h-8 rounded-full bg-[#8B4513] text-white flex items-center justify-center font-bold text-sm hover:bg-[#703610] transition shadow-sm">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="w-8 h-8 rounded-full bg-white border border-slate-200 text-black flex items-center justify-center hover:bg-slate-50 transition shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </a>
                    @endauth
                </div>
            @endif
        </div>

        <!-- Category Chips -->
        <div class="mt-3 overflow-x-auto hide-scrollbar flex space-x-2 pb-2 pl-1">
            <button class="chip active whitespace-nowrap px-4 py-1.5 rounded-full bg-white border border-slate-200 text-sm font-medium shadow-sm hover:bg-slate-50" data-category="all">Semua</button>
            <div id="category-container" class="flex space-x-2"></div>
        </div>
    </div>
</div>
