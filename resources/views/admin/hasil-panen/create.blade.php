<x-admin-layout>
    <x-slot name="header">
        Tambah Data Hasil Panen
    </x-slot>

    <div class="max-w-2xl">
        <div class="mb-8">
            <a href="{{ route('admin.hasil-panen.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-[#8B4513] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
        </div>

        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-50">
                <h3 class="text-lg font-black text-slate-900">Input Produksi Kopi</h3>
                <p class="text-slate-500 text-xs mt-1">Masukkan data hasil panen per kecamatan di Temanggung.</p>
            </div>
            
            <form method="POST" action="{{ route('admin.hasil-panen.store') }}" class="p-8 space-y-6">
                @csrf
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Wilayah Kecamatan</label>
                    <input type="text" name="kecamatan" value="{{ old('kecamatan') }}" required placeholder="Contoh: Kledung"
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all font-semibold text-slate-700">
                    @error('kecamatan') <p class="mt-2 text-xs text-rose-500 font-bold">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Hasil Robusta (Ton)</label>
                        <input type="number" step="0.01" min="0" name="hasil_robusta" value="{{ old('hasil_robusta', 0) }}" required
                            class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all font-semibold text-slate-700">
                        @error('hasil_robusta') <p class="mt-2 text-xs text-rose-500 font-bold">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Hasil Arabika (Ton)</label>
                        <input type="number" step="0.01" min="0" name="hasil_arabika" value="{{ old('hasil_arabika', 0) }}" required
                            class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all font-semibold text-slate-700">
                        @error('hasil_arabika') <p class="mt-2 text-xs text-rose-500 font-bold">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-5 bg-[#8B4513] text-white rounded-2xl font-black shadow-lg shadow-amber-900/20 hover:bg-[#703610] transition-all transform active:scale-[0.98] flex items-center justify-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        SIMPAN DATA PANEN
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
