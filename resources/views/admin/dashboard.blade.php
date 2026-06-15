<x-admin-layout>
    <x-slot name="header">
        Ringkasan Sistem
    </x-slot>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <!-- Card 1 -->
        <div class="bg-white overflow-hidden shadow-sm border border-slate-100 rounded-2xl sm:rounded-3xl p-5 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Pengguna</p>
                    <h3 class="mt-1 text-3xl font-black text-slate-900">{{ $stats['users'] }}</h3>
                </div>
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs font-bold text-emerald-600">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                <span>Aktif di Sistem</span>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white overflow-hidden shadow-sm border border-slate-100 rounded-2xl sm:rounded-3xl p-5 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Total UMKM</p>
                    <h3 class="mt-1 text-3xl font-black text-slate-900">{{ $stats['umkms'] }}</h3>
                </div>
                <div class="w-12 h-12 bg-amber-50 text-[#8B4513] rounded-2xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs font-bold text-[#8B4513]">
                <span>Terdaftar di Peta</span>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white overflow-hidden shadow-sm border border-slate-100 rounded-2xl sm:rounded-3xl p-5 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Total Produk</p>
                    <h3 class="mt-1 text-3xl font-black text-slate-900">{{ $stats['products'] }}</h3>
                </div>
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs font-bold text-emerald-600">
                <span>Katalog Aktif</span>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white overflow-hidden shadow-sm border border-slate-100 rounded-2xl sm:rounded-3xl p-5 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Menunggu</p>
                    <h3 class="mt-1 text-3xl font-black text-slate-900">{{ $stats['pending_umkms'] }}</h3>
                </div>
                <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs font-bold text-rose-600">
                <span>Perlu Validasi</span>
            </div>
        </div>
    </div>
</x-admin-layout>
