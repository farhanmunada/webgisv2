<x-admin-layout>
    <x-slot name="header">
        Detail Produk
    </x-slot>

    <div class="max-w-4xl bg-white rounded-2xl sm:rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/3">
                @if($product->foto_produk)
                    <img src="{{ asset('storage/' . $product->foto_produk) }}" class="w-full h-64 md:h-full object-cover" />
                @else
                    <div class="w-full h-64 bg-slate-100 flex items-center justify-center text-slate-400">
                        <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                @endif
            </div>
            <div class="p-6 sm:p-8 md:w-2/3">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 sm:gap-4 mb-4">
                    <div>
                        <h3 class="text-xl sm:text-2xl font-black text-slate-900">{{ $product->nama_produk }}</h3>
                        <p class="text-[#8B4513] font-bold mt-1 text-xs sm:text-sm">{{ $product->umkm->nama_umkm ?? 'UMKM Tidak Diketahui' }}</p>
                    </div>
                    <div class="text-xl sm:text-2xl font-black text-[#8B4513]">
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </div>
                </div>

                <div class="prose prose-slate max-w-none text-slate-600 text-xs sm:text-sm mb-8">
                    {{ $product->deskripsi ?? 'Tidak ada deskripsi produk.' }}
                </div>

                <div class="pt-6 sm:pt-8 border-t border-slate-50 flex justify-between items-center text-xs sm:text-sm">
                    <a href="{{ route('admin.products.index') }}" class="text-slate-500 font-bold hover:underline">Kembali ke Daftar</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                        @csrf @method('DELETE')
                        <button class="px-4 sm:px-6 py-2 bg-rose-50 text-rose-600 rounded-xl font-bold hover:bg-rose-100 transition-colors">
                            Hapus Produk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
