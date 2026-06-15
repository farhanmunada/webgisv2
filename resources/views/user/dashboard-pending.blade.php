<x-umkm-layout>
    <x-slot name="header">
        Status Pendaftaran
    </x-slot>

    <div class="flex flex-col items-center justify-center min-h-[60vh] py-12 px-4 text-center">
        <div class="w-24 h-24 bg-amber-50 rounded-full flex items-center justify-center mb-8 relative">
            <svg class="w-12 h-12 text-[#8B4513] animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <div class="absolute inset-0 rounded-full border-4 border-[#8B4513] border-t-transparent animate-spin"></div>
        </div>
        
        <h2 class="text-3xl font-black text-slate-900 mb-4 tracking-tight">Menunggu Persetujuan Admin</h2>
        <p class="text-slate-500 max-w-md mx-auto leading-relaxed mb-8">
            Pendaftaran usaha <strong>{{ $umkm->nama_umkm }}</strong> sedang dalam proses validasi oleh tim kami. Mohon tunggu informasi selanjutnya.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full max-w-2xl">
            <div class="p-6 bg-white rounded-3xl border border-slate-100 shadow-sm">
                <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Tanggal Daftar</span>
                <span class="font-bold text-slate-900">{{ $umkm->created_at->format('d M Y') }}</span>
            </div>
            <div class="p-6 bg-white rounded-3xl border border-slate-100 shadow-sm">
                <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Kategori</span>
                <span class="font-bold text-slate-900">{{ $umkm->category->nama_kategori }}</span>
            </div>
            <div class="p-6 bg-white rounded-3xl border border-slate-100 shadow-sm">
                <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Lokasi</span>
                <span class="font-bold text-slate-900">{{ $umkm->kecamatan }}</span>
            </div>
        </div>

        <div class="mt-10 flex flex-col sm:flex-row gap-3 w-full max-w-md mx-auto justify-center">
            <a href="/" class="w-full px-5 sm:px-8 py-3.5 sm:py-4 bg-slate-900 text-white rounded-xl sm:rounded-2xl font-black text-[10px] sm:text-xs uppercase tracking-widest hover:bg-slate-800 transition-all shadow-xl shadow-slate-200 text-center">
                Kembali ke Peta
            </a>
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full px-5 sm:px-8 py-3.5 sm:py-4 bg-white border border-slate-200 text-slate-600 rounded-xl sm:rounded-2xl font-black text-[10px] sm:text-xs uppercase tracking-widest hover:bg-slate-50 transition-all text-center">
                    Keluar Akun
                </button>
            </form>
        </div>
    </div>
</x-umkm-layout>
