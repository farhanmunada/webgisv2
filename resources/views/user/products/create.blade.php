<x-umkm-layout>
    <x-slot name="header">
        Tambah Produk Baru
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <form action="{{ route('umkm.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            
            <div class="bg-white rounded-[2rem] sm:rounded-[2.5rem] border border-slate-100 shadow-sm p-6 sm:p-8 space-y-6">
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

            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <button type="submit" class="flex-1 py-3.5 sm:py-4 bg-[#8B4513] text-white rounded-xl sm:rounded-2xl font-black text-xs sm:text-sm shadow-xl shadow-amber-900/20 hover:bg-[#703610] transition-all transform active:scale-95 flex items-center justify-center gap-2">
                    SIMPAN PRODUK
                    <svg class="w-4 h-4 sm:w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
                <a href="{{ route('dashboard') }}" class="px-6 sm:px-8 py-3.5 sm:py-4 bg-white text-slate-400 border border-slate-200 rounded-xl sm:rounded-2xl font-black text-xs sm:text-sm hover:text-slate-600 transition-all text-center">Batal</a>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
    function compressImage(file, maxWidth, maxHeight, quality, callback) {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (event) {
            const img = new Image();
            img.src = event.target.result;
            img.onload = function () {
                const canvas = document.createElement('canvas');
                let width = img.width;
                let height = img.height;

                if (width > height) {
                    if (width > maxWidth) {
                        height = Math.round((height * maxWidth) / width);
                        width = maxWidth;
                    }
                } else {
                    if (height > maxHeight) {
                        width = Math.round((width * maxHeight) / height);
                        height = maxHeight;
                    }
                }

                canvas.width = width;
                canvas.height = height;

                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0, width, height);

                canvas.toBlob(function (blob) {
                    const compressedFile = new File([blob], file.name.replace(/\.[^/.]+$/, "") + ".jpg", {
                        type: 'image/jpeg',
                        lastModified: Date.now()
                    });
                    callback(compressedFile);
                }, 'image/jpeg', quality);
            };
        };
    }

    document.getElementById('foto-input').addEventListener('change', function(e) {
        const preview = document.getElementById('image-preview');
        const file = e.target.files[0];
        const self = this;
        
        if (file) {
            // 1. Validasi Tipe File
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            if (!allowedTypes.includes(file.type)) {
                window.showToast('Format file tidak didukung. Gunakan JPG, PNG, atau JPEG.', 'error');
                this.value = ''; // Reset input
                preview.innerHTML = `<svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>`;
                return;
            }

            // Tampilkan indikator memproses
            preview.innerHTML = `
                <div class="flex flex-col items-center justify-center">
                    <svg class="animate-spin w-8 h-8 text-[#8B4513] mb-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Mengompres foto...</p>
                </div>
            `;

            // Nonaktifkan tombol submit selama kompresi
            const submitBtn = document.querySelector('button[type="submit"]');
            if (submitBtn) submitBtn.disabled = true;

            // Jalankan kompresi client-side (maksimal lebar/tinggi 1000px, kualitas 0.7)
            compressImage(file, 1000, 1000, 0.7, function(compressedFile) {
                // Masukkan file hasil kompresi ke input file
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(compressedFile);
                self.files = dataTransfer.files;

                // Buat preview dari file hasil kompresi
                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.innerHTML = `<img src="${event.target.result}" class="w-full h-full object-cover rounded-3xl animate-slide-up">`;
                }
                reader.readAsDataURL(compressedFile);

                // Aktifkan kembali tombol submit
                if (submitBtn) submitBtn.disabled = false;
                
                window.showToast('Foto berhasil dioptimasi otomatis!', 'success');
            });
        }
    });
    </script>
    @endpush
</x-umkm-layout>
