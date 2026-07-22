<x-umkm-layout>
    <x-slot name="header">
        Akun Ditangguhkan
    </x-slot>

    <div class="flex flex-col items-center justify-center min-h-[60vh] py-12 px-4 text-center">
        {{-- Ikon penangguhan --}}
        <div class="w-24 h-24 bg-red-50 rounded-full flex items-center justify-center mb-8">
            <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
            </svg>
        </div>

        <span class="inline-block px-4 py-1.5 bg-red-100 text-red-700 text-[10px] font-black uppercase tracking-widest rounded-full mb-6">
            Akun Ditangguhkan
        </span>

        <h2 class="text-3xl font-black text-slate-900 mb-4 tracking-tight">
            UMKM Anda Sedang Ditangguhkan
        </h2>
        <p class="text-slate-500 max-w-md mx-auto leading-relaxed mb-3">
            Akun UMKM <strong>{{ $umkm->nama_umkm }}</strong> telah ditangguhkan oleh admin karena terdeteksi pelanggaran terhadap ketentuan layanan platform.
        </p>
        <p class="text-slate-500 max-w-md mx-auto leading-relaxed mb-10">
            Selama masa penangguhan, UMKM Anda tidak tampil di peta dan katalog publik.
        </p>

        {{-- Kotak info kontak admin --}}
        <div class="w-full max-w-md bg-red-50 border border-red-100 rounded-3xl p-6 mb-8 text-left">
            <p class="text-[10px] font-black text-red-400 uppercase tracking-widest mb-3">Hubungi Admin</p>
            <p class="text-slate-600 text-sm leading-relaxed mb-4">
                Jika Anda merasa ini adalah kesalahan atau ingin mengajukan keberatan, silakan hubungi tim admin kami melalui email:
            </p>
            <a href="mailto:no-reply@jelajahkopi.my.id"
               class="flex items-center gap-3 px-4 py-3 bg-white rounded-2xl border border-red-100 hover:border-red-300 transition-all group">
                <div class="w-8 h-8 bg-red-500 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="font-bold text-slate-900 text-sm group-hover:text-red-600 transition-colors">
                    no-reply@jelajahkopi.my.id
                </span>
            </a>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 w-full max-w-md mx-auto justify-center">
            <a href="/"
               class="w-full px-8 py-4 bg-slate-900 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-slate-800 transition-all shadow-xl shadow-slate-200 text-center">
                Kembali ke Peta
            </a>
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit"
                    class="w-full px-8 py-4 bg-white border border-slate-200 text-slate-600 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-slate-50 transition-all text-center">
                    Keluar Akun
                </button>
            </form>
        </div>
    </div>
</x-umkm-layout>
