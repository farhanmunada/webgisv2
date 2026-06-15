<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Petunjuk & Ketentuan - WebGIS Kopi Temanggung</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
            animation: fadeIn 0.4s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-[#FCF9F5] text-slate-900 font-sans antialiased">
    <nav class="sticky top-0 z-50 bg-[#FCF9F5]/85 backdrop-blur-md border-b border-orange-100/50">
        <div class="max-w-4xl mx-auto px-4 h-20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-slate-400 group-hover:bg-[#8B4513] group-hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </div>
                <span class="font-black text-slate-900 tracking-tight group-hover:text-[#8B4513] transition-colors">Kembali</span>
            </a>
            <span class="px-3 py-1 bg-amber-50 text-[#8B4513] text-[10px] font-black uppercase tracking-widest rounded-full border border-amber-100">Panduan</span>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-12">
        <header class="mb-12">
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 mb-4 tracking-tight leading-tight">
                Petunjuk & Ketentuan Penggunaan
            </h1>
            <p class="text-lg text-slate-500 leading-relaxed">
                Panduan lengkap untuk menjelajahi peta interaktif, memanfaatkan fitur WebGIS, mendaftarkan mitra UMKM, serta ketentuan yang berlaku bagi seluruh pengguna sistem.
            </p>
        </header>

        <!-- Tabs Navigation -->
        <div class="flex p-1 bg-slate-100/80 rounded-2xl mb-8 max-w-lg border border-slate-200/50">
            <button onclick="switchTab('visitor')" id="tab-btn-visitor" class="tab-btn flex-1 py-3 px-4 rounded-xl text-sm font-bold text-[#8B4513] bg-white shadow-sm transition-all duration-300">
                Pengunjung Publik
            </button>
            <button onclick="switchTab('umkm')" id="tab-btn-umkm" class="tab-btn flex-1 py-3 px-4 rounded-xl text-sm font-bold text-slate-600 hover:text-slate-900 transition-all duration-300">
                Mitra UMKM
            </button>
            <button onclick="switchTab('terms')" id="tab-btn-terms" class="tab-btn flex-1 py-3 px-4 rounded-xl text-sm font-bold text-slate-600 hover:text-slate-900 transition-all duration-300">
                Ketentuan Layanan
            </button>
        </div>

        <!-- Visitor Guide Tab Content -->
        <div id="tab-visitor" class="tab-content active space-y-8">
            <div class="bg-white p-8 rounded-[2rem] border border-orange-100/30 shadow-sm space-y-8 hover:shadow-md transition-shadow">
                <h2 class="text-2xl font-black text-slate-950 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-amber-50 text-[#8B4513] flex items-center justify-center text-sm font-bold">1</span>
                    Panduan bagi Pengunjung Publik
                </h2>
                <p class="text-slate-600 leading-relaxed">
                    Pengunjung dapat mengakses WebGIS secara bebas untuk mencari komoditas kopi dan lokasi UMKM. Beberapa fitur interaktif lanjutan memerlukan otentikasi login demi keamanan data.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center text-[#8B4513]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                            </div>
                            <h4 class="font-bold text-slate-900">Menjelajahi Peta Kopi</h4>
                        </div>
                        <p class="text-sm text-slate-500 leading-relaxed pl-13">
                            Buka halaman utama untuk melihat lokasi seluruh mitra UMKM Kopi yang telah terverifikasi. Klik penanda (marker) untuk memunculkan detail profil, foto, dan katalog produk.
                        </p>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center text-[#8B4513]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <h4 class="font-bold text-slate-900">Pencarian & Penyaringan</h4>
                        </div>
                        <p class="text-sm text-slate-500 leading-relaxed pl-13">
                            Ketik nama UMKM pada kolom pencarian di bagian atas peta, atau klik tombol filter kategori (Roastery, Coffee Shop, Supplier) untuk menyaring marker secara instan.
                        </p>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center text-[#8B4513]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <h4 class="font-bold text-slate-900">Pencarian Rute (Wajib Login)</h4>
                        </div>
                        <p class="text-sm text-slate-500 leading-relaxed pl-13">
                            Tekan tombol <strong>"Lihat Rute"</strong> di detail UMKM. Sistem akan memindai lokasi GPS Anda saat ini dan menggambar jalur rute terbaik lengkap dengan estimasi jarak dan waktu tempuh.
                        </p>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center text-[#8B4513]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            </div>
                            <h4 class="font-bold text-slate-900">Hasil Panen Wilayah (Wajib Login)</h4>
                        </div>
                        <p class="text-sm text-slate-500 leading-relaxed pl-13">
                            Klik tombol layer wilayah (poligon) untuk menampilkan peta tematik zonasi hasil panen. Klik salah satu kecamatan untuk melihat tonase panen Robusta dan Arabika wilayah tersebut.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- UMKM Guide Tab Content -->
        <div id="tab-umkm" class="tab-content space-y-8">
            <div class="bg-white p-8 rounded-[2rem] border border-orange-100/30 shadow-sm space-y-8 hover:shadow-md transition-shadow">
                <h2 class="text-2xl font-black text-slate-950 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-amber-50 text-[#8B4513] flex items-center justify-center text-sm font-bold">2</span>
                    Panduan bagi Mitra UMKM
                </h2>
                <p class="text-slate-600 leading-relaxed">
                    Bagi pelaku usaha kopi di Kabupaten Temanggung, Anda dapat bergabung menjadi mitra untuk mempublikasikan lokasi fisik usaha serta katalog produk Anda secara gratis.
                </p>

                <div class="relative pl-8 border-l-2 border-amber-200 space-y-8">
                    <!-- Step 1 -->
                    <div class="relative">
                        <div class="absolute -left-12 top-0 w-8 h-8 rounded-full bg-[#8B4513] text-white flex items-center justify-center font-bold text-xs">
                            1
                        </div>
                        <h4 class="font-bold text-slate-900 mb-1">Registrasi Akun Baru</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Lakukan pendaftaran di menu <strong>"Daftar"</strong> pada bilah samping. Gunakan email aktif Anda untuk pendaftaran standar atau login praktis menggunakan akun Google.
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative">
                        <div class="absolute -left-12 top-0 w-8 h-8 rounded-full bg-[#8B4513] text-white flex items-center justify-center font-bold text-xs">
                            2
                        </div>
                        <h4 class="font-bold text-slate-900 mb-1">Mengisi Formulir Pengajuan UMKM</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Klik menu <strong>"Daftar UMKM"</strong> di sidebar. Masukkan nama usaha Anda, pilih kategori usaha, masukkan foto cover toko, deskripsi usaha, serta tentukan koordinat lokasi persis usaha Anda di peta menggunakan pencari lokasi atau klik langsung di peta.
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative">
                        <div class="absolute -left-12 top-0 w-8 h-8 rounded-full bg-[#8B4513] text-white flex items-center justify-center font-bold text-xs">
                            3
                        </div>
                        <h4 class="font-bold text-slate-900 mb-1">Menunggu Persetujuan Admin</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Setelah formulir dikirim, status UMKM Anda akan menjadi <em>pending</em>. Administrator sistem akan meninjau kelayakan dan ketepatan data lokasi Anda sebelum memberikan persetujuan (approval).
                        </p>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative">
                        <div class="absolute -left-12 top-0 w-8 h-8 rounded-full bg-[#8B4513] text-white flex items-center justify-center font-bold text-xs">
                            4
                        </div>
                        <h4 class="font-bold text-slate-900 mb-1">Mengelola Produk & Profil Toko</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Setelah disetujui, Anda dapat masuk ke <strong>Dashboard UMKM</strong> Anda. Di sini Anda bisa mengunggah produk kopi beserta nama, harga, deskripsi, dan foto produk agar langsung dapat dicari di katalog publik.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Terms & Conditions Tab Content -->
        <div id="tab-terms" class="tab-content space-y-8">
            <div class="bg-white p-8 rounded-[2rem] border border-orange-100/30 shadow-sm space-y-8 hover:shadow-md transition-shadow">
                <h2 class="text-2xl font-black text-slate-950 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-amber-50 text-[#8B4513] flex items-center justify-center text-sm font-bold">3</span>
                    Ketentuan Penggunaan Layanan
                </h2>
                <p class="text-slate-600 leading-relaxed">
                    Seluruh pengguna WebGIS Kopi Temanggung (baik Pengunjung umum maupun Mitra UMKM) wajib mematuhi aturan penggunaan sistem demi kenyamanan bersama.
                </p>

                <div class="space-y-6 pt-4">
                    <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 flex gap-4">
                        <div class="w-8 h-8 rounded-lg bg-[#8B4513]/10 text-[#8B4513] flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <div>
                            <h5 class="font-bold text-slate-900 mb-1">Akurasi & Integritas Data</h5>
                            <p class="text-sm text-slate-500 leading-relaxed">
                                Mitra UMKM wajib mengisi nama usaha, kontak, alamat, dan deskripsi produk kopi yang benar, akurat, dan tidak menyesatkan. Lokasi usaha yang didaftarkan harus berada di wilayah administratif Kabupaten Temanggung.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 flex gap-4">
                        <div class="w-8 h-8 rounded-lg bg-[#8B4513]/10 text-[#8B4513] flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <div>
                            <h5 class="font-bold text-slate-900 mb-1">Keamanan Kredensial Akun</h5>
                            <p class="text-sm text-slate-500 leading-relaxed">
                                Pengguna bertanggung jawab penuh untuk menjaga kerahasiaan password dan aktivitas yang dilakukan melalui akun pribadinya. Sistem tidak bertanggung jawab atas kerugian akibat kelalaian kata sandi pengguna.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 flex gap-4">
                        <div class="w-8 h-8 rounded-lg bg-[#8B4513]/10 text-[#8B4513] flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h5 class="font-bold text-slate-900 mb-1">Ketepatan Koordinat Lokasi Peta (GPS)</h5>
                            <p class="text-sm text-slate-500 leading-relaxed">
                                Penentuan titik koordinat latitude dan longitude mitra wajib disesuaikan dengan posisi fisik asli toko kopi Anda. Akurasi peta sangat krusial agar jalur rute jalan (polyline) yang digambar pada peta pengunjung tidak mengalami kesalahan arah navigasi.
                            </p>
                        </div>
                    </div>

                    <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 flex gap-4">
                        <div class="w-8 h-8 rounded-lg bg-[#8B4513]/10 text-[#8B4513] flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <div>
                            <h5 class="font-bold text-slate-900 mb-1">Kebijakan Hak Cipta & Konten Layak</h5>
                            <p class="text-sm text-slate-500 leading-relaxed">
                                Seluruh foto profil UMKM dan foto katalog produk kopi yang diunggah dilarang mengandung unsur SARA, ujaran kebencian, pornografi, maupun pelanggaran hak cipta. Administrator berhak menghapus konten atau memblokir akun yang melanggar ketentuan ini secara sepihak.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-slate-50 py-12 mt-20 border-t border-slate-100">
        <div class="max-w-4xl mx-auto px-4 text-center space-y-2">
            <p class="text-slate-400 text-sm font-medium">&copy; {{ date('Y') }} WebGIS Kopi Temanggung.</p>
            <p class="text-slate-300 text-xs font-semibold uppercase tracking-wider">Kabupaten Temanggung - Jawa Tengah.</p>
        </div>
    </footer>

    <script>
        function switchTab(tabId) {
            // Hide all contents
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => content.classList.remove('active'));

            // Show target content
            const targetContent = document.getElementById('tab-' + tabId);
            if (targetContent) {
                targetContent.classList.add('active');
            }

            // Update button styles
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => {
                btn.classList.remove('text-[#8B4513]', 'bg-white', 'shadow-sm');
                btn.classList.add('text-slate-600', 'hover:text-slate-900');
            });

            const activeBtn = document.getElementById('tab-btn-' + tabId);
            if (activeBtn) {
                activeBtn.classList.remove('text-slate-600', 'hover:text-slate-900');
                activeBtn.classList.add('text-[#8B4513]', 'bg-white', 'shadow-sm');
            }
        }
    </script>
</body>
</html>
