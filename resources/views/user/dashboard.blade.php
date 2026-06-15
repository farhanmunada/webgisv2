<x-umkm-layout>
    <x-slot name="header">
        Dashboard UMKM
    </x-slot>

    <!-- Compact Stats Row -->
    <div class="flex flex-wrap gap-4 mb-8">
        <div class="flex-1 min-w-[150px] bg-white px-6 py-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center text-[#8B4513] shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
            <div>
                <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Produk</span>
                <span class="text-lg font-black text-slate-900">{{ $stats['total_products'] }}</span>
            </div>
        </div>
        
        <div class="flex-1 min-w-[150px] bg-white px-6 py-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <div>
                <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Kategori</span>
                <span class="text-sm font-black text-slate-900 truncate max-w-[100px]">{{ $umkm->category->nama_kategori ?? '-' }}</span>
            </div>
        </div>

        <div class="flex-1 min-w-[150px] bg-white px-6 py-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <span class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</span>
                <span class="text-sm font-black text-emerald-600 uppercase">Aktif</span>
            </div>
        </div>
    </div>

    <!-- Product List -->
    <div class="bg-white rounded-[2rem] sm:rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden mb-8">
        <div class="p-6 sm:p-8 border-b border-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h3 class="text-lg sm:text-xl font-black text-slate-900">Katalog Produk</h3>
                <p class="text-slate-500 text-xs mt-1">Kelola produk kopi yang Anda tampilkan di WebGIS.</p>
            </div>
            <a href="{{ route('umkm.products.create') }}" class="inline-flex items-center gap-2 px-4 sm:px-6 py-2.5 sm:py-3 bg-[#8B4513] text-white rounded-xl sm:rounded-2xl text-[10px] sm:text-xs font-black shadow-lg shadow-amber-900/20 hover:bg-[#703610] transition-all transform active:scale-95 uppercase tracking-widest">
                <svg class="w-3.5 h-3.5 sm:w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                Tambah Produk
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-4 sm:px-8 py-4 sm:py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Produk</th>
                        <th class="px-4 sm:px-8 py-4 sm:py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Harga</th>
                        <th class="px-4 sm:px-8 py-4 sm:py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($products as $product)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-4 sm:px-8 py-4 sm:py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-slate-100 overflow-hidden shrink-0 border border-slate-200">
                                        @if($product->foto_produk)
                                            <img src="{{ asset('storage/' . $product->foto_produk) }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-300">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <span class="block font-bold text-slate-900 text-xs sm:text-sm leading-tight">{{ $product->nama_produk }}</span>
                                        <span class="text-[10px] text-slate-500 font-medium hidden sm:block mt-0.5">{{ Str::limit($product->deskripsi, 40) }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 sm:px-8 py-4 sm:py-5">
                                <span class="text-sm font-black text-slate-900">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                            </td>
                            <td class="px-4 sm:px-8 py-4 sm:py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('umkm.products.edit', $product) }}" class="p-2 text-slate-400 hover:text-amber-600 transition-colors bg-slate-50 rounded-lg hover:bg-amber-50">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('umkm.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 transition-colors bg-slate-50 rounded-lg hover:bg-rose-50">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-8 py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-20 h-20 bg-slate-50 rounded-3xl flex items-center justify-center text-slate-200 mb-4">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                    </div>
                                    <h4 class="text-slate-900 font-bold">Katalog Kosong</h4>
                                    <p class="text-slate-500 text-xs">Mulai tambahkan produk kopi terbaik Anda sekarang.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($products->hasPages())
        <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
            {{ $products->links('vendor.pagination.premium') }}
        </div>
        @endif
    </div>

    <!-- Info Section -->
    <div class="bg-white rounded-[2rem] sm:rounded-[2.5rem] border border-slate-100 shadow-sm p-6 sm:p-12 text-center">
        <div class="w-16 h-16 sm:w-24 sm:h-24 bg-amber-50 rounded-[1.5rem] sm:rounded-[2rem] flex items-center justify-center text-[#8B4513] mx-auto mb-6">
            <svg class="w-8 h-8 sm:w-12 sm:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <h3 class="text-xl sm:text-2xl font-black text-slate-900 mb-4">Profil UMKM Anda Aktif</h3>
        <p class="text-slate-500 max-w-lg mx-auto leading-relaxed text-xs sm:text-sm">Selamat! Unit usaha Anda sudah terdaftar dan terlihat di peta publik WebGIS Kopi Temanggung. Anda dapat memperbarui informasi profil dan lokasi melalui menu Edit Profil.</p>
        
        <div class="mt-8 sm:mt-10 flex flex-col sm:flex-row justify-center gap-3 max-w-md mx-auto">
            <a href="{{ route('umkm.profile.edit') }}" class="w-full sm:w-auto px-5 sm:px-8 py-3.5 sm:py-4 bg-[#8B4513] text-white rounded-xl sm:rounded-2xl font-black text-[10px] sm:text-xs shadow-xl shadow-amber-900/20 hover:bg-[#703610] transition-all transform active:scale-95 uppercase tracking-widest text-center">
                Edit Profil UMKM
            </a>
            <a href="/" class="w-full sm:w-auto px-5 sm:px-8 py-3.5 sm:py-4 bg-white text-slate-600 border border-slate-200 rounded-xl sm:rounded-2xl font-black text-[10px] sm:text-xs hover:bg-slate-50 transition-all uppercase tracking-widest text-center">
                Lihat di Peta
            </a>
        </div>
    </div>
</x-umkm-layout>
