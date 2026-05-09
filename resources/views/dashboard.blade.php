<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-slate-800 leading-tight">
                {{ __('Dashboard Saya') }}
            </h2>
            <a href="/" class="flex items-center gap-2 px-4 py-2 bg-[#8B4513] text-white rounded-2xl text-sm font-bold shadow-lg shadow-amber-900/20 hover:bg-[#703610] transition-all transform active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L16 4m0 13V4m0 0L9 7"></path></svg>
                Kembali ke Peta
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 sm:rounded-3xl p-8 mb-8">
                <div class="flex flex-col md:flex-row items-center gap-6">
                    <div class="w-20 h-20 bg-amber-50 rounded-3xl flex items-center justify-center text-[#8B4513]">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-slate-900">Halo, {{ Auth::user()->name }}!</h3>
                        <p class="text-slate-500 mt-1">Selamat datang kembali di WebGIS Kopi Temanggung. Kelola profil dan data UMKM Anda di sini.</p>
                    </div>
                </div>
            </div>

            <!-- Stats/Actions Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Action Card 1 -->
                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all group">
                    <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-600 mb-4 group-hover:bg-amber-50 group-hover:text-[#8B4513] transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <h4 class="font-bold text-slate-900">Profil Saya</h4>
                    <p class="text-sm text-slate-500 mt-1">Perbarui informasi akun dan keamanan Anda.</p>
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center gap-1 text-sm font-bold text-[#8B4513] mt-4 hover:underline">
                        Edit Profil
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <!-- Action Card 2 -->
                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all group">
                    <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-600 mb-4 group-hover:bg-amber-50 group-hover:text-[#8B4513] transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h4 class="font-bold text-slate-900">Data UMKM</h4>
                    <p class="text-sm text-slate-500 mt-1">Daftarkan atau kelola unit usaha kopi Anda.</p>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-1 text-sm font-bold text-[#8B4513] mt-4 hover:underline">
                        Buka Dashboard UMKM
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <!-- Action Card 3 (Info) -->
                <div class="bg-[#8B4513] p-6 rounded-3xl shadow-xl shadow-amber-900/20 text-white flex flex-col justify-between">
                    <div>
                        <h4 class="font-bold text-lg">WebGIS Temanggung</h4>
                        <p class="text-sm text-white/70 mt-2">Sistem informasi geografis persebaran UMKM Kopi dan pemetaan hasil panen kecamatan.</p>
                    </div>
                    <a href="/" class="inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest bg-white/10 hover:bg-white/20 px-4 py-2 rounded-xl self-start transition-all mt-6">
                        Lihat Peta
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
