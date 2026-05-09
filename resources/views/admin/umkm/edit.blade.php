<x-admin-layout>
    <x-slot name="header">
        Edit UMKM
    </x-slot>

    <div class="max-w-5xl">
        <div class="mb-8 flex items-center justify-between">
            <a href="{{ route('admin.umkm.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-[#8B4513] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
            <div class="px-4 py-1.5 bg-amber-50 rounded-full border border-amber-100">
                <span class="text-[10px] font-black uppercase text-[#8B4513] tracking-widest">ID: {{ $umkm->id }}</span>
            </div>
        </div>

        <form action="{{ route('admin.umkm.update', $umkm) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @csrf
            @method('PUT')
            
            <!-- Left Column: Main Info -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Location Picker -->
                <div class="bg-white rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)] overflow-hidden">
                    <div class="p-8 border-b border-slate-50">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                            <div>
                                <h3 class="text-lg font-black text-slate-900">Ubah Titik Lokasi</h3>
                                <p class="text-slate-500 text-xs mt-1">Klik atau geser marker untuk mengubah koordinat</p>
                            </div>
                            <button type="button" id="btn-get-location" class="flex items-center gap-2 px-4 py-2.5 bg-slate-900 text-white rounded-xl text-xs font-bold hover:bg-slate-800 transition-all shadow-lg shadow-slate-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Lokasi Saya Sekarang
                            </button>
                        </div>
                    </div>
                    <div id="map-picker" class="w-full h-80 bg-slate-50"></div>
                    <div class="p-8 bg-slate-50/50">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Latitude</label>
                                <input type="text" name="latitude" id="lat" value="{{ old('latitude', $umkm->latitude) }}" required readonly
                                    class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-[#8B4513]/20 focus:border-[#8B4513] outline-none transition-all font-mono text-sm">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Longitude</label>
                                <input type="text" name="longitude" id="lng" value="{{ old('longitude', $umkm->longitude) }}" required readonly
                                    class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-[#8B4513]/20 focus:border-[#8B4513] outline-none transition-all font-mono text-sm">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8">
                    <h3 class="text-lg font-black text-slate-900 mb-6">Detail Informasi</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nama UMKM</label>
                            <input type="text" name="nama_umkm" value="{{ old('nama_umkm', $umkm->nama_umkm) }}" required
                                class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-[#8B4513]/20 focus:border-[#8B4513] outline-none transition-all">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Kategori Bisnis</label>
                                <div class="relative group">
                                    <select name="kategori_id" required 
                                        class="w-full px-6 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all appearance-none cursor-pointer text-sm font-bold text-slate-700 hover:border-[#8B4513]/30 shadow-sm">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('kategori_id', $umkm->kategori_id) == $category->id ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-slate-300 group-hover:text-[#8B4513] transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Wilayah Kecamatan</label>
                                <div class="relative group">
                                    <select name="kecamatan" required 
                                        class="w-full px-6 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all appearance-none cursor-pointer text-sm font-bold text-slate-700 hover:border-[#8B4513]/30 shadow-sm">
                                        @foreach($kecamatans as $kec)
                                            <option value="{{ $kec }}" {{ old('kecamatan', $umkm->kecamatan) == $kec ? 'selected' : '' }}>{{ $kec }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-slate-300 group-hover:text-[#8B4513] transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Lengkap</label>
                            <textarea name="alamat" rows="3" required
                                class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-[#8B4513]/20 focus:border-[#8B4513] outline-none transition-all">{{ old('alamat', $umkm->alamat) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi (Opsional)</label>
                            <textarea name="deskripsi" rows="5"
                                class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-[#8B4513]/20 focus:border-[#8B4513] outline-none transition-all">{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Image & Action -->
            <div class="space-y-8">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8">
                    <h3 class="text-lg font-black text-slate-900 mb-6">Foto Unit</h3>
                    <div class="space-y-4">
                        <div id="image-preview" class="w-full aspect-video rounded-2xl bg-slate-50 border border-slate-200 overflow-hidden shadow-inner">
                            @if($umkm->foto)
                                <img src="{{ asset('storage/' . $umkm->foto) }}" class="w-full h-full object-cover" />
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-300">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>
                        <input type="file" name="foto" id="foto-input" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-amber-50 file:text-[#8B4513] hover:file:bg-amber-100 transition-all cursor-pointer" />
                    </div>
                </div>

                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8 sticky top-8">
                    <button type="submit" class="w-full py-5 bg-[#8B4513] text-white rounded-2xl font-black shadow-lg shadow-amber-900/20 hover:bg-[#703610] transition-all transform active:scale-[0.98] flex items-center justify-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        UPDATE DATA UMKM
                    </button>
                    <a href="{{ route('admin.umkm.index') }}" class="block text-center py-4 text-sm font-bold text-slate-400 hover:text-slate-600 transition-all mt-2">Batal & Kembali</a>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        let map, marker;
        const initialPos = { 
            lat: {{ $umkm->latitude ?? -7.3274 }}, 
            lng: {{ $umkm->longitude ?? 110.1772 }} 
        };

        function initMap() {
            map = new google.maps.Map(document.getElementById("map-picker"), {
                center: initialPos,
                zoom: 15,
                disableDefaultUI: false,
                mapTypeControl: false,
                streetViewControl: false,
                fullscreenControl: true,
                styles: [
                    { "featureType": "poi", "stylers": [{ "visibility": "off" }] },
                    { "featureType": "transit", "stylers": [{ "visibility": "off" }] }
                ]
            });

            marker = new google.maps.Marker({
                position: initialPos,
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                icon: {
                    url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                }
            });

            // Map Click
            map.addListener("click", (e) => {
                updatePosition(e.latLng);
            });

            // Marker Drag
            marker.addListener("dragend", (e) => {
                updatePosition(e.latLng);
            });
        }

        function updatePosition(latLng) {
            marker.setPosition(latLng);
            document.getElementById('lat').value = latLng.lat().toFixed(7);
            document.getElementById('lng').value = latLng.lng().toFixed(7);
        }

        // Get Location
        document.getElementById('btn-get-location').addEventListener('click', () => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        updatePosition(new google.maps.LatLng(pos.lat, pos.lng));
                        map.setCenter(pos);
                        map.setZoom(16);
                    },
                    () => alert("Gagal mengambil lokasi. Pastikan GPS aktif.")
                );
            } else {
                alert("Browser tidak mendukung geolokasi.");
            }
        });

        // Image Preview & Validation
        document.getElementById('foto-input').addEventListener('change', function(e) {
            const preview = document.getElementById('image-preview');
            const file = e.target.files[0];
            
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
                        preview.innerHTML = `<div class="w-full h-full flex items-center justify-center text-slate-300"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>`;
                    @endif
                    return;
                }

                // 2. Validasi Ukuran (5MB)
                if (file.size > 5 * 1024 * 1024) {
                    window.showToast('Ukuran file terlalu besar. Maksimal 5MB.', 'error');
                    this.value = ''; // Reset input
                    @if($umkm->foto)
                        preview.innerHTML = `<img src="{{ asset('storage/' . $umkm->foto) }}" class="w-full h-full object-cover" />`;
                    @else
                        preview.innerHTML = `<div class="w-full h-full flex items-center justify-center text-slate-300"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>`;
                    @endif
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.innerHTML = `<img src="${event.target.result}" class="w-full h-full object-cover rounded-2xl animate-slide-up">`;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key', env('GOOGLE_MAPS_API_KEY')) }}&callback=initMap" async defer></script>
    @endpush
</x-admin-layout>
