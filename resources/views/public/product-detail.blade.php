<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->nama_produk }} - WebGIS Kopi Temanggung</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-900 font-sans antialiased">
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 h-20 flex items-center justify-between">
            <a href="{{ route('katalog') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-[#8B4513] group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </div>
                <span class="font-black text-slate-900 tracking-tight group-hover:text-[#8B4513] transition-colors">Kembali ke Katalog</span>
            </a>
            <div class="flex items-center gap-2">
                <span class="px-3 py-1 bg-amber-50 text-[#8B4513] text-[10px] font-black uppercase tracking-widest rounded-full border border-amber-100">{{ $product->umkm->category->nama_kategori ?? 'Kopi' }}</span>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Left: Image Section -->
            <div class="space-y-6">
                <div class="aspect-square bg-slate-50 rounded-[2.5rem] border border-slate-100 overflow-hidden shadow-2xl shadow-slate-200">
                    @if($product->foto_produk)
                        <img src="{{ asset('storage/' . $product->foto_produk) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-200">
                            <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right: Info Section -->
            <div class="flex flex-col justify-center">
                <div class="mb-8">
                    <span class="text-xs font-black text-[#8B4513] uppercase tracking-[0.3em] mb-3 block">{{ $product->umkm->nama_umkm }}</span>
                    <h1 class="text-5xl font-black text-slate-900 leading-tight mb-4">{{ $product->nama_produk }}</h1>
                    <div class="flex items-center gap-4 mt-6">
                        <span class="text-4xl font-black text-[#8B4513]">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="prose prose-slate max-w-none mb-10">
                    <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Deskripsi Produk</h3>
                    <p class="text-lg text-slate-600 leading-relaxed">{{ $product->deskripsi ?? 'Tidak ada deskripsi untuk produk ini.' }}</p>
                </div>

                <div class="p-8 bg-slate-50 rounded-3xl border border-slate-100 space-y-4">
                    <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Informasi Penjual</h4>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#8B4513] rounded-2xl flex items-center justify-center text-white font-black">
                            {{ substr($product->umkm->nama_umkm, 0, 1) }}
                        </div>
                        <div>
                            <span class="block font-bold text-slate-900">{{ $product->umkm->nama_umkm }}</span>
                            <span class="text-xs text-slate-500">{{ $product->umkm->alamat }}</span>
                        </div>
                    </div>
                    <a href="/?lat={{ $product->umkm->latitude }}&lng={{ $product->umkm->longitude }}" class="w-full mt-4 flex items-center justify-center gap-3 py-4 bg-white border border-slate-200 text-slate-700 rounded-2xl font-black hover:bg-slate-50 transition-all shadow-sm">
                        <svg class="w-5 h-5 text-[#8B4513]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        LIHAT LOKASI DI PETA
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white py-12 mt-20 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-slate-400 text-sm font-medium">&copy; {{ date('Y') }} WebGIS Kopi Temanggung. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
