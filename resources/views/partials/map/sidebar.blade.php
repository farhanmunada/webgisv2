<div id="sidebar-overlay" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-[60] opacity-0 pointer-events-none transition-opacity duration-300"></div>
<aside id="sidebar-drawer" class="fixed top-0 left-0 h-full w-72 bg-white z-[70] transform -translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
    <!-- Header -->
    <div class="p-6 border-b border-slate-50 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-[#8B4513] flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <span class="font-black text-slate-900 tracking-tight">KopiTemanggung</span>
        </div>
        <button id="close-sidebar" class="p-2 text-slate-400 hover:text-slate-600 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
        @auth
            @php
                $umkm = \App\Models\Umkm::where('user_id', auth()->id())->first();
            @endphp

            @if(auth()->user()->role === 'admin')
                <div class="px-4 py-2"><span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Admin Panel</span></div>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 px-4 py-4 rounded-2xl text-slate-600 hover:bg-slate-50 transition-all">
                    <div class="p-2 rounded-xl bg-slate-50"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg></div>
                    <span class="font-bold text-sm">Dashboard Admin</span>
                </a>
                <a href="{{ route('admin.umkm.index') }}" class="flex items-center gap-4 px-4 py-4 rounded-2xl text-slate-600 hover:bg-slate-50 transition-all">
                    <div class="p-2 rounded-xl bg-slate-50"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg></div>
                    <span class="font-bold text-sm">Kelola UMKM</span>
                </a>
            @else
                @if(!$umkm)
                    <a href="{{ route('umkm.register') }}" class="flex items-center gap-4 px-4 py-4 rounded-2xl bg-amber-50 text-[#8B4513] hover:bg-amber-100 transition-all group">
                        <div class="p-2 rounded-xl bg-white shadow-sm group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-black text-sm">Daftar UMKM</span>
                            <span class="text-[10px] text-[#8B4513]/60 font-bold uppercase tracking-widest">Registrasi Usaha</span>
                        </div>
                    </a>
                @elseif($umkm->status === 'approved')
                    <div class="px-4 py-2"><span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Menu UMKM</span></div>
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-4 px-4 py-4 rounded-2xl text-slate-600 hover:bg-slate-50 transition-all">
                        <div class="p-2 rounded-xl bg-slate-50"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg></div>
                        <span class="font-bold text-sm">Dashboard UMKM</span>
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-4 px-4 py-4 rounded-2xl bg-slate-50 text-slate-400 cursor-not-allowed">
                        <div class="p-2 rounded-xl bg-white shadow-sm"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                        <div class="flex flex-col">
                            <span class="font-black text-sm">Menunggu Approval</span>
                            <span class="text-[10px] font-bold uppercase tracking-widest">Status Pending</span>
                        </div>
                    </a>
                @endif
            @endif
        @endauth

        <div class="pt-4 pb-2 px-4"><span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Informasi</span></div>
        <a href="{{ route('katalog') }}" class="flex items-center gap-4 px-4 py-4 rounded-2xl text-slate-600 hover:bg-slate-50 transition-all group">
            <div class="p-2 rounded-xl bg-slate-50 group-hover:bg-[#8B4513]/10 transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg></div>
            <span class="font-bold text-sm">Katalog Produk</span>
        </a>
        <a href="{{ route('about') }}" class="flex items-center gap-4 px-4 py-4 rounded-2xl text-slate-600 hover:bg-slate-50 transition-all group">
            <div class="p-2 rounded-xl bg-slate-50 group-hover:bg-[#8B4513]/10 transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
            <span class="font-bold text-sm">Tentang Sistem</span>
        </a>
    </nav>

    <!-- Footer -->
    <div class="p-6 border-t border-slate-50">
        @guest
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('login') }}" class="py-4 bg-[#8B4513] text-white rounded-2xl font-black text-xs text-center uppercase tracking-widest shadow-lg shadow-amber-900/10 hover:bg-[#703610] transition-all">Masuk</a>
                <a href="{{ route('register') }}" class="py-4 bg-slate-100 text-slate-600 rounded-2xl font-black text-xs text-center uppercase tracking-widest hover:bg-slate-200 transition-all">Daftar</a>
            </div>
        @else
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#8B4513] text-white flex items-center justify-center font-bold">{{ substr(auth()->user()->name, 0, 1) }}</div>
                    <div class="flex flex-col">
                        <span class="text-sm font-bold text-slate-900 leading-tight truncate w-32">{{ auth()->user()->name }}</span>
                        <span class="text-[10px] font-black text-slate-400 uppercase">{{ auth()->user()->role }}</span>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-4 bg-white border border-slate-100 text-rose-500 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-rose-50 hover:border-rose-100 transition-all flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        LOGOUT
                    </button>
                </form>
            </div>
        @endguest
    </div>
</aside>
