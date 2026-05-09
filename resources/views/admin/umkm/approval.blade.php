<x-admin-layout>
    <x-slot name="header">
        Approval UMKM
    </x-slot>

    <div class="mb-8">
        <h3 class="text-xl font-bold text-slate-900">Menunggu Persetujuan</h3>
        <p class="text-slate-500 text-sm mt-1">Verifikasi pendaftaran unit usaha baru dari masyarakat.</p>
    </div>

    <div class="bg-white rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-6 py-5 text-xs font-bold text-slate-400 uppercase tracking-wider">Pendaftar</th>
                        <th class="px-6 py-5 text-xs font-bold text-slate-400 uppercase tracking-wider">Informasi UMKM</th>
                        <th class="px-6 py-5 text-xs font-bold text-slate-400 uppercase tracking-wider">Kategori & Lokasi</th>
                        <th class="px-6 py-5 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($umkms as $umkm)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-amber-50 flex items-center justify-center text-[#8B4513] font-bold text-xs border border-amber-100">
                                        {{ substr($umkm->user->name ?? 'A', 0, 1) }}
                                    </div>
                                    <span class="text-sm font-bold text-slate-700">{{ $umkm->user->name ?? 'Admin Input' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <span class="block font-bold text-slate-900">{{ $umkm->nama_umkm }}</span>
                                <span class="text-xs text-slate-500">{{ Str::limit($umkm->alamat, 40) }}</span>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex flex-col gap-1">
                                    <span class="text-[10px] font-black uppercase text-[#8B4513]">{{ $umkm->category->nama_kategori ?? '-' }}</span>
                                    <span class="text-xs text-slate-600">{{ $umkm->kecamatan }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-right">
                                <div class="flex justify-end gap-2" x-data="{ open: false, umkm: {{ json_encode($umkm) }} }">
                                    <button @click="open = true; $nextTick(() => initPreviewMap(umkm))" 
                                        class="px-4 py-2 bg-slate-50 text-slate-600 rounded-xl text-xs font-black hover:bg-slate-100 transition-all uppercase tracking-wider border border-slate-100">
                                        Preview
                                    </button>

                                    <!-- Modal Preview -->
                                    <template x-if="open">
                                        <div class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6">
                                            <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" @click="open = false"></div>
                                            
                                            <div class="bg-white w-full max-w-4xl rounded-[2.5rem] shadow-2xl relative overflow-hidden flex flex-col max-h-[90vh]" @click.stop>
                                                <!-- Header -->
                                                <div class="p-8 border-b border-slate-50 flex items-center justify-between shrink-0">
                                                    <div>
                                                        <h3 class="text-xl font-black text-slate-900" x-text="umkm.nama_umkm"></h3>
                                                        <p class="text-xs text-slate-500 mt-1">Verifikasi lokasi dan detail usaha sebelum aktivasi.</p>
                                                    </div>
                                                    <button @click="open = false" class="p-2 text-slate-400 hover:text-slate-600">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                    </button>
                                                </div>

                                                <!-- Body -->
                                                <div class="flex-1 overflow-y-auto p-8 space-y-8">
                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                                        <!-- Map -->
                                                        <div class="space-y-4">
                                                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Titik Koordinat</label>
                                                            <div :id="'map-preview-' + umkm.id" class="w-full h-64 rounded-3xl bg-slate-100 border border-slate-200"></div>
                                                            <div class="flex gap-4">
                                                                <div class="flex-1">
                                                                    <span class="block text-[10px] text-slate-400 font-bold uppercase">Lat</span>
                                                                    <span class="text-sm font-bold text-slate-700" x-text="umkm.latitude"></span>
                                                                </div>
                                                                <div class="flex-1">
                                                                    <span class="block text-[10px] text-slate-400 font-bold uppercase">Long</span>
                                                                    <span class="text-sm font-bold text-slate-700" x-text="umkm.longitude"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Image & Details -->
                                                        <div class="space-y-6">
                                                            <div>
                                                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Foto Usaha</label>
                                                                <div class="aspect-video rounded-3xl bg-slate-50 border border-slate-100 overflow-hidden">
                                                                    <template x-if="umkm.foto">
                                                                        <img :src="'/storage/' + umkm.foto" class="w-full h-full object-cover">
                                                                    </template>
                                                                    <template x-if="!umkm.foto">
                                                                        <div class="w-full h-full flex items-center justify-center text-slate-300 italic text-xs">Tidak ada foto</div>
                                                                    </template>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Alamat Lengkap</label>
                                                                <p class="text-sm font-bold text-slate-700 leading-relaxed" x-text="umkm.alamat"></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="bg-amber-50 p-6 rounded-3xl border border-amber-100">
                                                        <label class="block text-[10px] font-black text-[#8B4513] uppercase tracking-widest mb-2">Deskripsi Usaha</label>
                                                        <p class="text-sm font-medium text-[#8B4513]/80 leading-relaxed" x-text="umkm.deskripsi || 'Tidak ada deskripsi.'"></p>
                                                    </div>
                                                </div>

                                                <!-- Footer -->
                                                <div class="p-8 border-t border-slate-50 flex justify-end gap-3 shrink-0">
                                                    <form :action="'/admin/umkm-approval/' + umkm.id + '/approve'" method="POST">
                                                        @csrf
                                                        <button type="submit" class="px-8 py-3 bg-emerald-600 text-white rounded-2xl text-xs font-black shadow-lg shadow-emerald-200 hover:bg-emerald-700 transition-all uppercase tracking-widest">
                                                            Approve Sekarang
                                                        </button>
                                                    </form>
                                                    <form :action="'/admin/umkm-approval/' + umkm.id + '/reject'" method="POST">
                                                        @csrf
                                                        <button type="submit" class="px-8 py-3 bg-rose-50 text-rose-600 rounded-2xl text-xs font-black hover:bg-rose-100 transition-all uppercase tracking-widest">
                                                            Tolak
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-slate-50 text-slate-200 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <h4 class="text-slate-900 font-bold">Semua Bersih!</h4>
                                    <p class="text-slate-500 text-sm">Tidak ada pendaftaran UMKM yang perlu divalidasi.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($umkms->hasPages())
        <div class="px-8 py-6 bg-slate-50/30 border-t border-slate-100">
            {{ $umkms->links('vendor.pagination.premium') }}
        </div>
        @endif
    </div>

    @push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
    <script>
        function initPreviewMap(umkm) {
            const pos = { lat: parseFloat(umkm.latitude), lng: parseFloat(umkm.longitude) };
            const mapId = 'map-preview-' + umkm.id;
            
            // Tunggu sebentar sampai DOM modal benar-benar siap
            setTimeout(() => {
                const map = new google.maps.Map(document.getElementById(mapId), {
                    center: pos,
                    zoom: 15,
                    disableDefaultUI: true,
                    styles: [
                        { "featureType": "poi", "stylers": [{ "visibility": "off" }] }
                    ]
                });

                new google.maps.Marker({
                    position: pos,
                    map: map,
                    animation: google.maps.Animation.DROP,
                    icon: {
                        url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                    }
                });
            }, 100);
        }
    </script>
    @endpush
</x-admin-layout>
