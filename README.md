# WebGIS Kopi Temanggung

WebGIS Kopi Temanggung adalah platform sistem informasi geografis yang dirancang untuk memetakan persebaran UMKM kopi dan data hasil panen di Kabupaten Temanggung. Aplikasi ini bertujuan untuk mempermudah akses informasi bagi publik dan menyediakan alat manajemen bagi pelaku usaha serta pemerintah daerah.

## Fitur Utama

- Pemetaan Interaktif: Menampilkan lokasi UMKM kopi menggunakan Google Maps API.
- Heatmap Densitas: Visualisasi kepadatan UMKM di berbagai wilayah Kabupaten Temanggung.
- Katalog Produk: Daftar produk kopi unggulan dari berbagai UMKM yang terdaftar.
- Manajemen Profil UMKM: Memungkinkan pemilik usaha untuk mendaftarkan dan memperbarui informasi usaha mereka secara mandiri.
- Visualisasi Hasil Panen: Menampilkan data statistik hasil panen kopi per kecamatan melalui pop-up pada poligon wilayah.
- Pencarian dan Filter: Memudahkan pengguna mencari UMKM berdasarkan nama atau kategori bisnis.

## Teknologi yang Digunakan

- Framework: Laravel 11
- Database: MySQL
- Frontend: Blade Template Engine, TailwindCSS, Alpine.js
- Maps API: Google Maps Platform (Maps, Visualization, Geolocation)
- Autentikasi: Laravel Breeze, Google OAuth

## Persyaratan Sistem

- PHP 8.2 atau lebih tinggi
- Composer
- Node.js dan NPM
- MySQL 8.0 atau lebih tinggi

## Instalasi

1. Clone repositori ini
2. Jalankan perintah composer install
3. Salin file .env.example menjadi .env dan sesuaikan konfigurasi database serta API Key Google Maps
4. Jalankan php artisan key:generate
5. Jalankan php artisan migrate --seed
6. Jalankan php artisan storage:link
7. Jalankan npm install && npm run dev
8. Jalankan php artisan serve

## Keamanan

Data kredensial dan kunci API dilindungi melalui mekanisme environment variables dan tidak disertakan dalam repositori publik melalui konfigurasi .gitignore yang ketat.

## Lisensi

Proyek ini dikembangkan untuk kepentingan pengembangan potensi lokal Kabupaten Temanggung.
