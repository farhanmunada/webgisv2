<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Produk - WebGIS Kopi Temanggung</title>
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
                <span class="px-3 py-1 bg-amber-50 text-[#8B4513] text-[10px] font-black uppercase tracking-widest rounded-full border border-amber-100">Katalog</span>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-12">
        <header class="mb-12">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8">
                <div class="max-w-2xl">
                    <h1 class="text-4xl font-black text-slate-900 mb-4">Produk Unggulan</h1>
                    <p class="text-slate-500 mb-8">Temukan berbagai varian kopi terbaik langsung dari petani dan pelaku UMKM Kabupaten Temanggung.</p>
                    
                    <!-- Category Chips -->
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('katalog') }}" class="px-5 py-2.5 rounded-full text-xs font-black uppercase tracking-widest transition-all {{ !request('category') ? 'bg-[#8B4513] text-white shadow-lg shadow-amber-900/20' : 'bg-slate-50 text-slate-400 hover:bg-slate-100' }}">
                            Semua
                        </a>
                        @foreach($categories as $category)
                            <a href="{{ route('katalog', ['category' => $category->id, 'search' => request('search')]) }}" 
                               class="px-5 py-2.5 rounded-full text-xs font-black uppercase tracking-widest transition-all {{ request('category') == $category->id ? 'bg-[#8B4513] text-white shadow-lg shadow-amber-900/20' : 'bg-slate-50 text-slate-400 hover:bg-slate-100' }}">
                                {{ $category->nama_kategori }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="w-full lg:w-96">
                    <form action="{{ route('katalog') }}" method="GET" class="relative group">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kopi atau UMKM..." 
                               class="w-full pl-14 pr-6 py-4 bg-white border border-slate-200 rounded-3xl text-sm font-medium focus:ring-4 focus:ring-amber-50 focus:border-[#8B4513] transition-all outline-none shadow-sm">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-[#8B4513] transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        @if(request('search'))
                            <a href="{{ route('katalog', ['category' => request('category')]) }}" class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-300 hover:text-rose-500 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-8">
            @forelse($products as $product)
                <a href="{{ route('katalog.detail', $product) }}" class="group bg-white rounded-[1.5rem] sm:rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 overflow-hidden block">
                    <div class="aspect-square bg-slate-50 overflow-hidden relative">
                        @if($product->foto_produk)
                            <img src="{{ asset('storage/' . $product->foto_produk) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-200">
                                <svg class="w-12 h-12 sm:w-20 sm:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute top-2 left-2 sm:top-4 sm:left-4">
                            <span class="px-2 py-0.5 sm:px-3 sm:py-1 bg-white/90 backdrop-blur shadow-sm rounded-full text-[8px] sm:text-[10px] font-black text-[#8B4513] uppercase tracking-widest border border-amber-100">
                                {{ $product->umkm->category->nama_kategori ?? 'Kopi' }}
                            </span>
                        </div>
                    </div>
                    <div class="p-3 sm:p-6">
                        <span class="text-[8px] sm:text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1 block truncate">{{ $product->umkm->nama_umkm ?? 'UMKM Temanggung' }}</span>
                        <h3 class="text-xs sm:text-lg font-bold text-slate-900 mb-1 group-hover:text-[#8B4513] transition-colors line-clamp-1">{{ $product->nama_produk }}</h3>
                        <div class="mt-2 sm:mt-4">
                            <span class="text-sm sm:text-xl font-black text-[#8B4513]">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full py-20 text-center">
                    <p class="text-slate-400 italic">Belum ada produk yang tersedia.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16 flex justify-center">
            {{ $products->links('vendor.pagination.premium') }}
        </div>
    </main>

    <footer class="bg-slate-50 py-12 mt-20 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-slate-400 text-sm font-medium">&copy; {{ date('Y') }} WebGIS Kopi Temanggung. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
