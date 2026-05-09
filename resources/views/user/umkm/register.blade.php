<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar UMKM Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 tracking-tight">Pendaftaran Usaha</h1>
                    <p class="text-slate-500 mt-2 font-medium">Lengkapi data usaha kopi Anda untuk bergabung dalam ekosistem WebGIS.</p>
                </div>
                <a href="/" class="inline-flex items-center gap-2 px-6 py-3 bg-white border border-slate-200 rounded-2xl text-sm font-bold text-slate-600 hover:text-[#8B4513] hover:border-[#8B4513] transition-all shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Batal & Kembali
                </a>
            </div>

            <form action="{{ route('umkm.register.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column: Basic Info -->
                    <div class="lg:col-span-2 space-y-8">
                        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                            <div class="p-8 border-b border-slate-50">
                                <h3 class="text-lg font-black text-slate-900">Informasi Dasar</h3>
                                <p class="text-slate-500 text-xs mt-1">Identitas utama usaha Anda.</p>
                            </div>
                            <div class="p-8 space-y-6">
                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Nama UMKM</label>
                                    <input type="text" name="nama_umkm" value="{{ old('nama_umkm') }}" required placeholder="Masukkan nama usaha Anda..."
                                        class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all font-bold text-slate-700">
                                    @error('nama_umkm') <p class="mt-2 text-xs text-rose-500 font-bold">{{ $message }}</p> @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Kategori Bisnis</label>
                                        <div class="relative group">
                                            <select name="kategori_id" required 
                                                class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all appearance-none cursor-pointer text-sm font-bold text-slate-700">
                                                <option value="" disabled selected>Pilih Kategori</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                            <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-slate-300">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Wilayah Kecamatan</label>
                                        <div class="relative group">
                                            <select name="kecamatan" required 
                                                class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all appearance-none cursor-pointer text-sm font-bold text-slate-700">
                                                <option value="" disabled selected>Pilih Kecamatan</option>
                                                @foreach($kecamatans as $kec)
                                                    <option value="{{ $kec }}">{{ $kec }}</option>
                                                @endforeach
                                            </select>
                                            <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-slate-300">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Deskripsi Singkat</label>
                                    <textarea name="deskripsi" rows="4" placeholder="Ceritakan keunggulan kopi Anda..."
                                        class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all font-bold text-slate-700">{{ old('deskripsi') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Map Section -->
                        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                            <div class="p-8 border-b border-slate-50 flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-black text-slate-900">Titik Lokasi</h3>
                                    <p class="text-slate-500 text-xs mt-1">Klik pada peta atau geser marker untuk menentukan koordinat.</p>
                                </div>
                                <button type="button" id="btn-get-location" class="px-4 py-2 bg-amber-50 text-[#8B4513] rounded-xl text-xs font-black flex items-center gap-2 hover:bg-amber-100 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    LOKASI SAYA
                                </button>
                            </div>
                            <div class="p-8 space-y-6">
                                <div id="map-picker" class="w-full h-[400px] rounded-3xl bg-slate-100 border border-slate-200 shadow-inner"></div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Latitude</label>
                                        <input type="text" name="latitude" id="lat" value="{{ old('latitude') }}" readonly required
                                            class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none font-bold text-slate-500">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Longitude</label>
                                        <input type="text" name="longitude" id="lng" value="{{ old('longitude') }}" readonly required
                                            class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none font-bold text-slate-500">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Alamat Lengkap</label>
                                    <textarea name="alamat" rows="3" required placeholder="Jalan, No, Desa/Kelurahan..."
                                        class="w-full px-6 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-[#8B4513]/5 focus:border-[#8B4513] outline-none transition-all font-bold text-slate-700">{{ old('alamat') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Media & Submit -->
                    <div class="space-y-8">
                        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden p-8">
                            <h3 class="text-lg font-black text-slate-900 mb-6">Foto UMKM</h3>
                            <div id="image-preview" class="w-full aspect-square rounded-3xl bg-slate-50 border-2 border-dashed border-slate-200 flex flex-col items-center justify-center p-4 text-center overflow-hidden relative group">
                                <svg class="w-12 h-12 text-slate-300 mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Klik Pilih Foto</p>
                            </div>
                            <input type="file" name="foto" id="foto-input" class="mt-6 text-xs text-slate-500 file:mr-4 file:py-2 file:px-6 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-[#8B4513] file:text-white hover:file:bg-[#703610] cursor-pointer w-full" />
                            <p class="mt-4 text-[10px] text-slate-400 italic">Format: JPG, PNG, JPEG (Maks 2MB)</p>
                        </div>

                        <div class="bg-[#8B4513] rounded-[2.5rem] p-8 shadow-xl shadow-amber-900/20 text-white">
                            <h3 class="text-xl font-black mb-4">Siap Bergabung?</h3>
                            <p class="text-sm text-white/70 leading-relaxed mb-8 font-medium">Pastikan semua data sudah benar. Pendaftaran Anda akan ditinjau oleh Admin Temanggung Pride sebelum dipublikasikan.</p>
                            
                            <button type="submit" class="w-full py-5 bg-white text-[#8B4513] rounded-2xl font-black shadow-lg hover:bg-slate-50 transition-all transform active:scale-95 flex items-center justify-center gap-3">
                                DAFTARKAN UMKM
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        let map, marker;
        const initialPos = { lat: -7.3274, lng: 110.1772 };

        function initMap() {
            map = new google.maps.Map(document.getElementById("map-picker"), {
                center: initialPos,
                zoom: 12,
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
                    preview.innerHTML = `<svg class="w-12 h-12 text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Pilih Ulang Foto</p>`;
                    return;
                }

                // 2. Validasi Ukuran (5MB = 5 * 1024 * 1024 bytes)
                if (file.size > 5 * 1024 * 1024) {
                    window.showToast('Ukuran file terlalu besar. Maksimal 5MB.', 'error');
                    this.value = ''; // Reset input
                    preview.innerHTML = `<svg class="w-12 h-12 text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Pilih Ulang Foto</p>`;
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.innerHTML = `<img src="${event.target.result}" class="w-full h-full object-cover rounded-3xl animate-slide-up">`;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
    @endpush
</x-app-layout>
