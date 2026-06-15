<x-umkm-layout>
    <x-slot name="header">
        Edit Profil UMKM
    </x-slot>

    <div class="max-w-5xl mx-auto px-4">
        <form action="{{ route('umkm.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PATCH')
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white rounded-[2rem] sm:rounded-[2.5rem] border border-slate-100 shadow-sm p-6 sm:p-8 space-y-6">
                        <h3 class="text-lg font-black text-slate-900 border-b border-slate-50 pb-6 -mx-6 sm:-mx-8 px-6 sm:px-8">Informasi Dasar</h3>
                        
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Nama UMKM</label>
                            <input type="text" name="nama_umkm" value="{{ old('nama_umkm', $umkm->nama_umkm) }}" required
                                class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all font-bold text-slate-700">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Kategori</label>
                                <select name="kategori_id" required 
                                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all appearance-none cursor-pointer text-sm font-bold text-slate-700">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $umkm->kategori_id == $category->id ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Kecamatan</label>
                                <select name="kecamatan" required 
                                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all appearance-none cursor-pointer text-sm font-bold text-slate-700">
                                    @foreach($kecamatans as $kec)
                                        <option value="{{ $kec }}" {{ $umkm->kecamatan == $kec ? 'selected' : '' }}>{{ $kec }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Deskripsi</label>
                            <textarea name="deskripsi" rows="4"
                                class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all font-bold text-slate-700">{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                        </div>
                    </div>

                    <!-- Map Section -->
                    <div class="bg-white rounded-[2rem] sm:rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                        <div class="p-6 sm:p-8 border-b border-slate-50 flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-black text-slate-900">Lokasi di Peta</h3>
                                <p class="text-slate-500 text-xs mt-1">Klik atau geser marker untuk mengubah titik lokasi.</p>
                            </div>
                        </div>
                        <div class="p-6 sm:p-8 space-y-6">
                            <div id="map-picker" class="w-full h-64 rounded-3xl border border-slate-200 bg-slate-50"></div>
                            <div class="grid grid-cols-2 gap-6">
                                <input type="hidden" name="latitude" id="lat" value="{{ $umkm->latitude }}">
                                <input type="hidden" name="longitude" id="lng" value="{{ $umkm->longitude }}">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Alamat Lengkap</label>
                                <textarea name="alamat" rows="2" required
                                    class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all font-bold text-slate-700">{{ old('alamat', $umkm->alamat) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-8">
                    <div class="bg-white rounded-[2rem] sm:rounded-[2.5rem] border border-slate-100 shadow-sm p-6 sm:p-8">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-6 text-center">Foto Usaha</label>
                        <div id="image-preview" class="w-full aspect-square rounded-3xl bg-slate-50 border-2 border-dashed border-slate-200 overflow-hidden mb-6">
                            @if($umkm->foto)
                                <img src="{{ asset('storage/' . $umkm->foto) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-300 italic text-xs">Belum ada foto</div>
                            @endif
                        </div>
                        <input type="file" name="foto" id="foto-input" class="w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-[#8B4513] file:text-white cursor-pointer">
                    </div>

                    <button type="submit" class="w-full py-3.5 sm:py-4 bg-[#8B4513] text-white rounded-xl sm:rounded-2xl font-black text-xs sm:text-sm shadow-xl shadow-amber-900/20 hover:bg-[#703610] transition-all transform active:scale-95 flex items-center justify-center gap-2">
                        SIMPAN PERUBAHAN
                        <svg class="w-4 h-4 sm:w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        let map, marker;
        const initialPos = { lat: {{ $umkm->latitude }}, lng: {{ $umkm->longitude }} };

        function initMap() {
            map = new google.maps.Map(document.getElementById("map-picker"), {
                center: initialPos,
                zoom: 15,
                mapTypeControl: false,
                streetViewControl: false,
                styles: [{ "featureType": "poi", "stylers": [{ "visibility": "off" }] }]
            });

            marker = new google.maps.Marker({
                position: initialPos,
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP
            });

            map.addListener("click", (e) => updatePosition(e.latLng));
            marker.addListener("dragend", (e) => updatePosition(e.latLng));
        }

        function updatePosition(latLng) {
            marker.setPosition(latLng);
            document.getElementById('lat').value = latLng.lat().toFixed(7);
            document.getElementById('lng').value = latLng.lng().toFixed(7);
        }

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
                    // Reset to old image or placeholder
                    @if($umkm->foto)
                        preview.innerHTML = `<img src="{{ asset('storage/' . $umkm->foto) }}" class="w-full h-full object-cover" />`;
                    @else
                        preview.innerHTML = `<div class="w-full h-full flex items-center justify-center text-slate-300 italic text-xs">Belum ada foto</div>`;
                    @endif
                    return;
                }

                // Tampilkan indikator memproses
                preview.innerHTML = `
                    <div class="flex flex-col items-center justify-center h-full w-full py-6">
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
                        preview.innerHTML = `<img src="${event.target.result}" class="w-full h-full object-cover rounded-[2rem] animate-slide-up">`;
                    }
                    reader.readAsDataURL(compressedFile);

                    // Aktifkan kembali tombol submit
                    if (submitBtn) submitBtn.disabled = false;
                    
                    window.showToast('Foto berhasil dioptimasi otomatis!', 'success');
                });
            }
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
    @endpush
</x-umkm-layout>
