<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Umkm;
use App\Models\HasilPanen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Setup Admin
        User::firstOrCreate(
            ['email' => 'admin@kopi.com'],
            ['name' => 'Admin Kopi', 'password' => Hash::make('password'), 'role' => 'admin']
        );

        // Categories
        $catRoastery = Category::firstOrCreate(['nama_kategori' => 'Roastery']);
        $catCoffeeShop = Category::firstOrCreate(['nama_kategori' => 'Coffee Shop']);
        $catSupplier = Category::firstOrCreate(['nama_kategori' => 'Suplier Kopi']);

        // Hasil Panen
        $panenData = [
            "Bansari" => ["arabika" => 1.66, "robusta" => 91.98],
            "Bejen" => ["arabika" => 1.26, "robusta" => 943.5],
            "Bulu" => ["arabika" => 4.37, "robusta" => 11.1],
            "Candiroto" => ["arabika" => 29.11, "robusta" => 1136.9],
            "Gemawang" => ["arabika" => 0, "robusta" => 1563.2],
            "Jumo" => ["arabika" => 0, "robusta" => 670.5],
            "Kaloran" => ["arabika" => 9, "robusta" => 769.37],
            "Kandangan" => ["arabika" => 0, "robusta" => 1499.85],
            "Kedu" => ["arabika" => 0, "robusta" => 57],
            "Kledung" => ["arabika" => 167.5, "robusta" => 0],
            "Kranggan" => ["arabika" => 0, "robusta" => 236.07],
            "Ngadirejo" => ["arabika" => 64.24, "robusta" => 2.61],
            "Parakan" => ["arabika" => 26.98, "robusta" => 5.82],
            "Pringsurat" => ["arabika" => 0, "robusta" => 598],
            "Selopampang" => ["arabika" => 10.07, "robusta" => 10.79],
            "Temanggung" => ["arabika" => 0, "robusta" => 4.13],
            "Tembarak" => ["arabika" => 13.2, "robusta" => 5.76],
            "Tlogomulyo" => ["arabika" => 12.39, "robusta" => 3.43],
            "Tretep" => ["arabika" => 40.5, "robusta" => 353.6],
            "Wonoboyo" => ["arabika" => 148.76, "robusta" => 502.4]
        ];

        foreach ($panenData as $kecamatan => $hasil) {
            HasilPanen::updateOrCreate(
                ['kecamatan' => $kecamatan],
                [
                    'hasil_arabika' => $hasil['arabika'],
                    'hasil_robusta' => $hasil['robusta']
                ]
            );
        }

        // UMKM Data
        $roasteries = [
            ['nama' => 'ARTHESWARA COFFE AND ROASTERY', 'alamat' => 'P5QJ+FF3, RT.02/RW.02, Balun, Caruban, Kec. Kandangan, Kabupaten Temanggung, Jawa Tengah 56281', 'lat' => -7.261199517333912, 'lng' => 110.18218822923805],
            ['nama' => 'Bukhet Roastery', 'alamat' => 'Jl. Campur Salam, Grogol, Kutoanyar, Kec. Kedu, Kabupaten Temanggung, Jawa Tengah 56252', 'lat' => -7.268084319937249, 'lng' => 110.12090005252108],
            ['nama' => 'Ombe Coffee and Roastery', 'alamat' => 'Janggar, Gedongsari, Kec. Jumo, Kabupaten Temanggung, Jawa Tengah 56256', 'lat' => -7.241148842539805, 'lng' => 110.11285062923805],
            ['nama' => 'Coffee X Roastery', 'alamat' => 'Jl. Dr. Sutomo No.34, Brojolan Barat, Temanggung I, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56212', 'lat' => -7.310599471092303, 'lng' => 110.17736854228122],
            ['nama' => 'MM Coffee & Roastery (Hanny Roastery)', 'alamat' => 'RT.04/RW.04, Maluwih, Gesing, Kec. Kandangan, Kabupaten Temanggung, Jawa Tengah 56281', 'lat' => -7.239425667882056, 'lng' => 110.18206855938887]
        ];

        $coffeeShops = [
            ['nama' => 'jumpa Coffee & Eatery (cab. Alun Alun)', 'alamat' => 'Jl. Brigjen. Katamso No.8, Suronatan, Temanggung II, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56213', 'lat' => -7.3143591024690755, 'lng' => 110.17497539429739],
            ['nama' => 'satu Coffee Co.', 'alamat' => 'Jl. Perintis Kemerdekaan No.61, Jurang 1, Jurang, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56222', 'lat' => -7.304440915287371, 'lng' => 110.16735401524916],
            ['nama' => 'se n Coffee 55', 'alamat' => 'Jl. Jenderal Sudirman No.55, Mardisari, Kertosari, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56217', 'lat' => -7.3215016932016095, 'lng' => 110.18917242689072],
            ['nama' => 'AFE - Temanggung', 'alamat' => 'Jl. Brigjen. Katamso No.1, Kauman, Temanggung II, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56213', 'lat' => -7.316884158529644, 'lng' => 110.1753012575775],
            ['nama' => 'rajan Coffee', 'alamat' => 'Getas, Purworejo, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56277', 'lat' => -7.333565297320276, 'lng' => 110.17488122878873]
        ];

        $suppliers = [
            ['nama' => 'Coffee Arabica Lereng Prau', 'alamat' => 'M632+MCP, Jalan Merpati, Lungge 2, Lungge, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56229', 'lat' => -7.344966618415863, 'lng' => 110.20341438542384],
            ['nama' => 'Di Kopi', 'alamat' => 'M3W3+W39, Mertan, RT.01/RW.01, Bugal, Tuksari, Kec. Kledung, Kabupaten Temanggung, Jawa Tengah 56264', 'lat' => -7.30210150186189, 'lng' => 110.05257405142879],
            ['nama' => 'OS Coffee (Original Sindoro Coffee)', 'alamat' => 'Sangkon, RT. 01, RW.02, Tuksari, Kec. Kledung, Kabupaten Temanggung, Jawa Tengah 56264', 'lat' => -7.302697443532988, 'lng' => 110.0579813845912],
            ['nama' => 'Omah Kopi Kwadungan Temanggung', 'alamat' => 'RT.02/RW.03, Kwadungan Gn., Kec. Kledung, Kabupaten Temanggung, Jawa Tengah 56264', 'lat' => -7.312913463015973, 'lng' => 110.05317486616084],
            ['nama' => 'Sedoeloer Kopi Temanggung', 'alamat' => 'Jl. Ajibarang Secang No.55, Kwadungan Jurang, Paponan, Kec. Kledung, Kabupaten Temanggung, Jawa Tengah 56264', 'lat' => -7.311849305234612, 'lng' => 110.05952633685958]
        ];

        $this->seedUmkmList($roasteries, $catRoastery->id);
        $this->seedUmkmList($coffeeShops, $catCoffeeShop->id);
        $this->seedUmkmList($suppliers, $catSupplier->id);
    }

    private function seedUmkmList($list, $categoryId) {
        $admin = User::where('role', 'admin')->first();

        foreach ($list as $item) {
            Umkm::updateOrCreate(
                ['nama_umkm' => $item['nama']],
                [
                    'user_id' => $admin->id,
                    'kategori_id' => $categoryId,
                    'kecamatan' => 'Temanggung', // Default
                    'latitude' => $item['lat'],
                    'longitude' => $item['lng'],
                    'alamat' => $item['alamat'],
                    'status' => 'approved',
                    'deskripsi' => 'Kami adalah UMKM mitra pemetaan yang menyajikan kopi terbaik dari Temanggung.'
                ]
            );
        }
    }
}
