<x-admin-layout>
    <x-slot name="header">
        Tambah Kategori
    </x-slot>

    <div class="max-w-xl">
        <div class="mb-8">
            <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-bold text-slate-500 hover:text-[#8B4513] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
        </div>

        <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-5 sm:p-8 border-b border-slate-50">
                <h3 class="text-lg font-black text-slate-900">Kategori Baru</h3>
                <p class="text-slate-500 text-xs mt-1">Tambahkan klasifikasi usaha kopi Temanggung.</p>
            </div>
            
            <form method="POST" action="{{ route('admin.categories.store') }}" class="p-5 sm:p-8 space-y-4 sm:space-y-6">
                @csrf
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Nama Kategori</label>
                    <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}" required placeholder="Contoh: Kedai Kopi"
                        class="w-full px-4 sm:px-6 py-3 sm:py-4 bg-slate-50 border border-slate-200 rounded-xl sm:rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all font-semibold text-slate-700">
                    @error('nama_kategori') <p class="mt-2 text-xs text-rose-500 font-bold">{{ $message }}</p> @enderror
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-3.5 sm:py-4 bg-[#8B4513] text-white rounded-xl sm:rounded-2xl text-xs sm:text-sm font-black shadow-lg shadow-amber-900/20 hover:bg-[#703610] transition-all transform active:scale-[0.98] flex items-center justify-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                        SIMPAN KATEGORI
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
