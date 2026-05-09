<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kebijakan Privasi - WebGIS Kopi Temanggung</title>
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
            <span class="px-3 py-1 bg-slate-50 text-slate-400 text-[10px] font-black uppercase tracking-widest rounded-full border border-slate-100">Privasi</span>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-16">
        <article class="prose prose-slate lg:prose-xl">
            <h1 class="text-4xl font-black mb-8">Kebijakan Privasi</h1>
            <p class="text-lg text-slate-600 mb-8 leading-relaxed">WebGIS Kopi Temanggung berkomitmen untuk melindungi privasi Anda. Halaman ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda.</p>
            
            <div class="space-y-12">
                <section>
                    <h2 class="text-2xl font-bold text-slate-900 mb-4">1. Pengumpulan Data</h2>
                    <p class="text-slate-600 leading-relaxed">Kami mengumpulkan informasi saat Anda mendaftar sebagai UMKM, termasuk nama usaha, lokasi (koordinat), alamat, dan foto usaha untuk keperluan publikasi di peta interaktif kami.</p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 mb-4">2. Penggunaan Informasi</h2>
                    <p class="text-slate-600 leading-relaxed">Informasi yang dikumpulkan digunakan untuk:</p>
                    <ul class="list-disc pl-6 space-y-2 text-slate-600 mt-4">
                        <li>Menampilkan lokasi UMKM pada peta publik.</li>
                        <li>Memfasilitasi pencarian produk kopi di wilayah Temanggung.</li>
                        <li>Menganalisis persebaran hasil panen kopi secara geospasial.</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 mb-4">3. Keamanan Data</h2>
                    <p class="text-slate-600 leading-relaxed">Kami menerapkan standar keamanan industri untuk melindungi data Anda dari akses yang tidak sah. Kami tidak akan menjual atau menyebarkan informasi pribadi Anda kepada pihak ketiga tanpa izin Anda.</p>
                </section>
            </div>
        </article>
    </main>

    <footer class="bg-slate-50 py-12 mt-20 border-t border-slate-100">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <p class="text-slate-400 text-sm font-medium">&copy; {{ date('Y') }} WebGIS Kopi Temanggung.</p>
        </div>
    </footer>
</body>
</html>
