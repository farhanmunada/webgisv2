<x-umkm-layout>
    <x-slot name="header">
        UMKM Tidak Aktif
    </x-slot>

    <div class="flex flex-col items-center justify-center min-h-[60vh] py-12 px-4 text-center">
        {{-- Ikon nonaktif --}}
        <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mb-8">
            <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>

        <span class="inline-block px-4 py-1.5 bg-slate-100 text-slate-600 text-[10px] font-black uppercase tracking-widest rounded-full mb-6">
            Sedang Tidak Aktif
        </span>

        <h2 class="text-3xl font-black text-slate-900 mb-4 tracking-tight">
            UMKM Anda Tidak Aktif
        </h2>
        <p class="text-slate-500 max-w-md mx-auto leading-relaxed mb-10">
            UMKM <strong>{{ $umkm->nama_umkm }}</strong> sedang dalam kondisi tidak aktif. UMKM Anda tidak tampil di peta dan katalog publik. Aktifkan kembali kapan saja Anda siap.
        </p>

        {{-- Info cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full max-w-2xl mb-10">
            <div class="p-6 bg-white rounded-3xl border border-slate-100 shadow-sm">
                <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Nama UMKM</span>
                <span class="font-bold text-slate-900 text-sm leading-tight">{{ $umkm->nama_umkm }}</span>
            </div>
            <div class="p-6 bg-white rounded-3xl border border-slate-100 shadow-sm">
                <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Kategori</span>
                <span class="font-bold text-slate-900">{{ $umkm->category->nama_kategori ?? '-' }}</span>
            </div>
            <div class="p-6 bg-white rounded-3xl border border-slate-100 shadow-sm">
                <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Status</span>
                <span class="font-bold text-slate-400">Tidak Aktif</span>
            </div>
        </div>

        {{-- Tombol Aktifkan Kembali --}}
        <div class="w-full max-w-md mx-auto space-y-3">
            <form action="{{ route('umkm.reactivate') }}" method="POST"
                  onsubmit="return confirm('Aktifkan kembali UMKM Anda? UMKM akan kembali tampil di peta dan katalog publik.')">
                @csrf
                <button type="submit"
                    class="w-full px-8 py-4 bg-[#8B4513] text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-[#703610] transition-all shadow-xl shadow-amber-900/20 transform active:scale-95">
                    ✅ Aktifkan Kembali UMKM
                </button>
            </form>

            <div class="flex flex-col sm:flex-row gap-3">
                <a href="/"
                   class="w-full px-8 py-4 bg-white border border-slate-200 text-slate-600 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-slate-50 transition-all text-center">
                    Kembali ke Peta
                </a>
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit"
                        class="w-full px-8 py-4 bg-white border border-slate-200 text-slate-500 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-slate-50 transition-all text-center">
                        Keluar Akun
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-umkm-layout>
