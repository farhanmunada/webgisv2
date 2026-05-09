<x-umkm-layout>
    <x-slot name="header">
        Dashboard UMKM
    </x-slot>

    <!-- Compact Stats Row -->
    <div class="flex flex-wrap gap-4 mb-8">
        <div class="flex-1 min-w-[200px] bg-white px-6 py-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <div>
                <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Kategori</span>
                <span class="text-sm font-black text-slate-900 truncate">{{ $umkm->category->nama_kategori ?? '-' }}</span>
            </div>
        </div>

        <div class="flex-1 min-w-[200px] bg-white px-6 py-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</span>
                <span class="text-sm font-black text-emerald-600 uppercase">Aktif</span>
            </div>
        </div>

        <div class="flex-1 min-w-[200px] bg-white px-6 py-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center text-[#8B4513] shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <div>
                <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Wilayah</span>
                <span class="text-sm font-black text-slate-900 truncate">{{ $umkm->kecamatan }}</span>
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm p-12 text-center">
        <div class="w-24 h-24 bg-amber-50 rounded-[2rem] flex items-center justify-center text-[#8B4513] mx-auto mb-6">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <h3 class="text-2xl font-black text-slate-900 mb-4">Profil UMKM Anda Aktif</h3>
        <p class="text-slate-500 max-w-lg mx-auto leading-relaxed">Selamat! Unit usaha Anda sudah terdaftar dan terlihat di peta publik WebGIS Kopi Temanggung. Anda dapat memperbarui informasi profil dan lokasi melalui menu Edit Profil.</p>
        
        <div class="mt-10 flex justify-center gap-4">
            <a href="{{ route('umkm.profile.edit') }}" class="px-8 py-4 bg-[#8B4513] text-white rounded-2xl font-black text-sm shadow-xl shadow-amber-900/20 hover:bg-[#703610] transition-all transform active:scale-95 uppercase tracking-widest">
                Edit Profil UMKM
            </a>
            <a href="/" class="px-8 py-4 bg-white text-slate-600 border border-slate-200 rounded-2xl font-black text-sm hover:bg-slate-50 transition-all uppercase tracking-widest">
                Lihat di Peta
            </a>
        </div>
    </div>
</x-umkm-layout>
