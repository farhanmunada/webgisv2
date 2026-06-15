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
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
    @endpush
</x-umkm-layout>
