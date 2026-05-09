<x-admin-layout>
    <x-slot name="header">
        Daftar Produk
    </x-slot>

    <div class="mb-8">
        <h3 class="text-xl font-bold text-slate-900">Semua Produk UMKM</h3>
        <p class="text-slate-500 text-sm mt-1">Pantau dan kelola seluruh produk yang dipasarkan oleh mitra UMKM.</p>
    </div>

    <div class="bg-white rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.02)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-6 py-5 text-xs font-bold text-slate-400 uppercase tracking-wider">Informasi Produk</th>
                        <th class="px-6 py-5 text-xs font-bold text-slate-400 uppercase tracking-wider">Asal UMKM</th>
                        <th class="px-6 py-5 text-xs font-bold text-slate-400 uppercase tracking-wider">Harga Satuan</th>
                        <th class="px-6 py-5 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">Manajemen</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($products as $product)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-slate-100 flex-shrink-0 overflow-hidden border border-slate-200">
                                    @if($product->foto_produk)
                                        <img src="{{ asset('storage/' . $product->foto_produk) }}" class="w-full h-full object-cover" />
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <span class="block font-bold text-slate-900 group-hover:text-[#8B4513] transition-colors">{{ $product->nama_produk }}</span>
                                    <span class="text-[10px] text-slate-400 font-black uppercase tracking-widest">PROD-{{ $product->id }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <span class="px-3 py-1 bg-amber-50 text-[#8B4513] text-xs font-bold rounded-lg border border-amber-100">
                                {{ $product->umkm->nama_umkm ?? 'N/A' }}
                            </span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-sm font-black text-slate-700">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.products.show', $product) }}" class="p-2 text-slate-400 hover:text-[#8B4513] hover:bg-amber-50 rounded-xl transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
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
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                </div>
                                <h4 class="text-slate-900 font-bold">Belum ada produk</h4>
                                <p class="text-slate-500 text-sm">Produk akan muncul setelah UMKM mengunggah katalog mereka.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($products->hasPages())
        <div class="px-8 py-6 bg-slate-50/30 border-t border-slate-100">
            {{ $products->links('vendor.pagination.premium') }}
        </div>
        @endif
    </div>
</x-admin-layout>
