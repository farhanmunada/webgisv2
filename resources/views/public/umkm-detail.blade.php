<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $umkm->nama_umkm }} - WebGIS Kopi Temanggung</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-900 font-sans antialiased">
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 h-20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-[#8B4513] group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </div>
                <span class="font-black text-slate-900 tracking-tight group-hover:text-[#8B4513] transition-colors">Kembali ke Peta</span>
            </a>
            <div class="flex items-center gap-2">
                <span class="px-3 py-1 bg-amber-50 text-[#8B4513] text-[10px] font-black uppercase tracking-widest rounded-full border border-amber-100">Detail UMKM</span>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-12">
        <!-- UMKM Header -->
        <div class="bg-white rounded-[3rem] border border-slate-100 shadow-2xl shadow-slate-200 overflow-hidden mb-16">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="aspect-video lg:aspect-auto bg-slate-50">
                    @if($umkm->foto)
                        <img src="{{ asset('storage/' . $umkm->foto) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-200">
                            <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                    @endif
                </div>
                <div class="p-8 lg:p-16 flex flex-col justify-center">
                    <span class="text-xs font-black text-[#8B4513] uppercase tracking-[0.3em] mb-4 block">{{ $umkm->category->nama_kategori ?? 'Kopi' }}</span>
                    <h1 class="text-4xl lg:text-6xl font-black text-slate-900 leading-tight mb-6">{{ $umkm->nama_umkm }}</h1>
                    <p class="text-lg text-slate-500 leading-relaxed mb-8">{{ $umkm->deskripsi ?? 'UMKM mitra pilihan di Kabupaten Temanggung.' }}</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <p class="text-slate-600 font-medium">{{ $umkm->alamat }}, {{ $umkm->kecamatan }}</p>
                        </div>
                        <a href="/?lat={{ $umkm->latitude }}&lng={{ $umkm->longitude }}" class="inline-flex items-center gap-3 px-8 py-4 bg-[#8B4513] text-white rounded-2xl font-black shadow-xl shadow-amber-900/20 hover:bg-[#703610] transition-all transform active:scale-95">
                            LIHAT DI PETA
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products List -->
        <div>
            <div class="flex items-center justify-between mb-10">
                <h2 class="text-3xl font-black text-slate-900">Katalog Produk</h2>
                <div class="h-px flex-1 bg-slate-100 mx-8 hidden sm:block"></div>
                <span class="text-sm font-black text-slate-400 uppercase tracking-widest">{{ $umkm->products->count() }} Produk</span>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-10">
                @foreach($umkm->products as $product)
                    <a href="{{ route('katalog.detail', $product) }}" class="group block">
                        <div class="aspect-square bg-slate-50 rounded-[2rem] border border-slate-100 overflow-hidden shadow-sm group-hover:shadow-xl group-hover:-translate-y-2 transition-all duration-300 relative">
                            @if($product->foto_produk)
                                <img src="{{ asset('storage/' . $product->foto_produk) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-200">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                        <div class="mt-4 px-2 text-center">
                            <h4 class="font-bold text-slate-900 group-hover:text-[#8B4513] transition-colors truncate">{{ $product->nama_produk }}</h4>
                            <p class="text-[#8B4513] font-black mt-1">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        </div>
                    </a>
                @endforeach
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
