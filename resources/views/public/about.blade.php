<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Sistem - WebGIS Kopi Temanggung</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-900 font-sans antialiased">
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-4xl mx-auto px-4 h-20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-[#8B4513] group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </div>
                <span class="font-black text-slate-900 tracking-tight group-hover:text-[#8B4513] transition-colors">Kembali</span>
            </a>
            <span class="px-3 py-1 bg-slate-50 text-slate-400 text-[10px] font-black uppercase tracking-widest rounded-full border border-slate-100">Tentang</span>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-16">
        <div class="space-y-16">
            <header>
                <h1 class="text-5xl font-black text-slate-900 mb-6">WebGIS Kopi Temanggung</h1>
                <p class="text-xl text-slate-500 leading-relaxed max-w-2xl">Platform geospasial terintegrasi untuk memetakan potensi kopi, UMKM, dan hasil panen di Kabupaten Temanggung.</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="bg-slate-50 p-8 rounded-[2rem] border border-slate-100">
                    <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-[#8B4513]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                        Visi Sistem
                    </h3>
                    <p class="text-slate-600 leading-relaxed text-sm">Menjadi pusat data digital utama yang mendukung promosi UMKM kopi Temanggung dan memudahkan pengambilan kebijakan berbasis data geospasial bagi pemerintah setempat.</p>
                </div>

                <div class="bg-amber-50 p-8 rounded-[2rem] border border-amber-100">
                    <h3 class="text-xl font-bold mb-4 text-[#8B4513] flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Fitur Utama
                    </h3>
                    <ul class="space-y-2 text-sm text-[#8B4513]/80 font-medium">
                        <li>• Pemetaan Interaktif UMKM</li>
                        <li>• Analisis Hasil Panen Per Wilayah</li>
                        <li>• Katalog Produk Digital</li>
                    </ul>
                </div>
            </div>

            <section class="border-t border-slate-100 pt-16">
                <h2 class="text-2xl font-black text-slate-900 mb-6">Dikembangkan Oleh</h2>
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-slate-900 flex items-center justify-center text-white font-black text-2xl">
                        T
                    </div>
                    <div>
                        <span class="block font-bold text-lg">Tim Pengembang WebGIS</span>
                        <span class="text-slate-500">Temanggung Pride Project &copy; {{ date('Y') }}</span>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <footer class="bg-slate-50 py-12 mt-20 border-t border-slate-100">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <p class="text-slate-400 text-sm font-medium">Kabupaten Temanggung - Jawa Tengah.</p>
        </div>
    </footer>
</body>
</html>
