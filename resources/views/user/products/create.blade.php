<x-umkm-layout>
    <x-slot name="header">
        Tambah Produk Baru
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <form action="{{ route('umkm.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            
            <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm p-8 space-y-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" required placeholder="Contoh: Kopi Arabika Temanggung"
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all font-bold text-slate-700">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Harga (Rp)</label>
                    <input type="number" name="harga" value="{{ old('harga') }}" required placeholder="0"
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all font-bold text-slate-700">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Deskripsi Produk</label>
                    <textarea name="deskripsi" rows="4" placeholder="Jelaskan cita rasa dan keunggulan produk ini..."
                        class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all font-bold text-slate-700">{{ old('deskripsi') }}</textarea>
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Foto Produk</label>
                    <div id="image-preview" class="w-full aspect-video rounded-3xl bg-slate-50 border-2 border-dashed border-slate-200 overflow-hidden mb-4 flex items-center justify-center text-slate-300">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <input type="file" name="foto_produk" id="foto-input" required class="w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-[#8B4513] file:text-white cursor-pointer">
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="flex-1 py-5 bg-[#8B4513] text-white rounded-2xl font-black shadow-xl shadow-amber-900/20 hover:bg-[#703610] transition-all transform active:scale-95 flex items-center justify-center gap-3">
                    SIMPAN PRODUK
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
                <a href="{{ route('dashboard') }}" class="px-8 py-5 bg-white text-slate-400 border border-slate-200 rounded-2xl font-black hover:text-slate-600 transition-all">Batal</a>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        document.getElementById('foto-input').addEventListener('change', function(e) {
            const preview = document.getElementById('image-preview');
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (event) => preview.innerHTML = `<img src="${event.target.result}" class="w-full h-full object-cover">`;
                reader.readAsDataURL(file);
            }
        });
    </script>
    @endpush
</x-umkm-layout>
