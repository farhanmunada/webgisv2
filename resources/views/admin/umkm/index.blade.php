<x-admin-layout>
    <x-slot name="header">
        Kelola UMKM
    </x-slot>

    <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h3 class="text-xl font-bold text-slate-900">Daftar Unit Usaha</h3>
            <p class="text-slate-500 text-sm mt-1">Total {{ $umkms->total() }} UMKM terdaftar di sistem.</p>
        </div>
        <a href="{{ route('admin.umkm.create') }}" class="px-4 sm:px-6 py-2.5 sm:py-3 bg-[#8B4513] text-white rounded-xl sm:rounded-2xl text-[10px] sm:text-xs font-black shadow-lg shadow-amber-900/20 hover:bg-[#703610] transition-all transform active:scale-95 flex items-center gap-2 uppercase tracking-widest w-full sm:w-auto justify-center">
            <svg class="w-3.5 h-3.5 sm:w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
            Tambah UMKM Baru
        </a>
    </div>

    <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-3 sm:px-6 py-3 sm:py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Informasi UMKM</th>
                        <th class="px-3 sm:px-6 py-3 sm:py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Kategori</th>
                        <th class="px-3 sm:px-6 py-3 sm:py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Kecamatan</th>
                        <th class="px-3 sm:px-6 py-3 sm:py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Status</th>
                        <th class="px-3 sm:px-6 py-3 sm:py-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($umkms as $umkm)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-3 sm:px-6 py-3 sm:py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-slate-100 flex-shrink-0 overflow-hidden border border-slate-200">
                                    @if($umkm->foto)
                                        <img src="{{ asset('storage/' . $umkm->foto) }}" class="w-full h-full object-cover" />
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-400">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <span class="block font-bold text-slate-900 text-xs sm:text-sm group-hover:text-[#8B4513] transition-colors leading-tight">{{ $umkm->nama_umkm }}</span>
                                    <span class="text-[10px] sm:text-xs text-slate-500 truncate max-w-[150px] sm:max-w-[200px] block mt-0.5">{{ $umkm->alamat }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4">
                            <span class="px-2 py-0.5 sm:px-3 sm:py-1 bg-amber-50 text-[#8B4513] text-[9px] sm:text-[10px] font-black uppercase tracking-wider rounded-lg border border-amber-100">
                                {{ $umkm->category->nama_kategori ?? 'Umum' }}
                            </span>
                        </td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-slate-600 text-xs sm:text-sm font-semibold">{{ $umkm->kecamatan }}</td>
                        {{-- Kolom Status --}}
                        <td class="px-3 sm:px-6 py-3 sm:py-4">
                            @if($umkm->status === 'approved')
                                <span class="px-2 py-0.5 sm:px-3 sm:py-1 bg-green-50 text-green-700 text-[9px] sm:text-[10px] font-black uppercase tracking-wider rounded-lg border border-green-100">Aktif</span>
                            @elseif($umkm->status === 'pending')
                                <span class="px-2 py-0.5 sm:px-3 sm:py-1 bg-amber-50 text-amber-700 text-[9px] sm:text-[10px] font-black uppercase tracking-wider rounded-lg border border-amber-100">Pending</span>
                            @elseif($umkm->status === 'inactive')
                                <span class="px-2 py-0.5 sm:px-3 sm:py-1 bg-slate-100 text-slate-500 text-[9px] sm:text-[10px] font-black uppercase tracking-wider rounded-lg border border-slate-200">Tidak Aktif</span>
                            @elseif($umkm->status === 'suspended')
                                <span class="px-2 py-0.5 sm:px-3 sm:py-1 bg-red-50 text-red-700 text-[9px] sm:text-[10px] font-black uppercase tracking-wider rounded-lg border border-red-100">Ditangguhkan</span>
                            @endif
                        </td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-right">
                            <div class="flex justify-end gap-1">
                                <a href="{{ route('admin.umkm.edit', $umkm) }}" class="p-2 text-slate-400 hover:text-amber-600 hover:bg-amber-50 rounded-xl transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>

                                {{-- Tombol Tangguhkan (hanya untuk approved/inactive) --}}
                                @if(in_array($umkm->status, ['approved', 'inactive']))
                                <form action="{{ route('admin.umkm.suspend', $umkm) }}" method="POST"
                                      onsubmit="return confirm('Tangguhkan UMKM {{ $umkm->nama_umkm }}? Pemilik akan mendapat notifikasi email.')">
                                    @csrf
                                    <button type="submit" title="Tangguhkan" class="p-2 text-slate-400 hover:text-orange-600 hover:bg-orange-50 rounded-xl transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                                    </button>
                                </form>
                                @endif

                                {{-- Tombol Aktifkan Kembali (untuk suspended/inactive) --}}
                                @if(in_array($umkm->status, ['suspended', 'inactive']))
                                <form action="{{ route('admin.umkm.reactivate', $umkm) }}" method="POST"
                                      onsubmit="return confirm('Aktifkan kembali UMKM {{ $umkm->nama_umkm }}?')">
                                    @csrf
                                    <button type="submit" title="Aktifkan Kembali" class="p-2 text-slate-400 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </button>
                                </form>
                                @endif

                                <form action="{{ route('admin.umkm.destroy', $umkm) }}" method="POST" onsubmit="return confirm('Hapus UMKM ini?')">
                                    @csrf @method('DELETE')
                                    <button class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-slate-50 text-slate-200 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                </div>
                                <h4 class="text-slate-900 font-bold">Belum ada data UMKM</h4>
                                <p class="text-slate-500 text-sm">Silakan tambah data unit usaha pertama Anda.</p>
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
</x-admin-layout>
