<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HasilPanen;
use App\Models\Umkm;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function getMarkers()
    {
        // Hanya ambil marker untuk UMKM yang sudah di-approve, batasi 3 produk terbaru
        $umkms = Umkm::where('status', 'approved')->with([
            'category', 
            'products' => function($query) {
                $query->latest()->limit(3);
            }
        ])->get(['id', 'latitude', 'longitude', 'kategori_id', 'nama_umkm', 'alamat', 'foto', 'deskripsi', 'kecamatan']);
        
        return response()->json($umkms);
    }

    public function getHeatmap()
    {
        $points = Umkm::where('status', 'approved')->get(['latitude', 'longitude']);
        return response()->json($points);
    }

    public function getPolygons()
    {
        $hasil_panen = HasilPanen::all();
        return response()->json($hasil_panen);
    }

    public function getStats()
    {
        $stats = [
            'total_umkm' => Umkm::where('status', 'approved')->count(),
            'by_category' => Umkm::where('status', 'approved')
                ->join('categories', 'umkms.kategori_id', '=', 'categories.id')
                ->selectRaw('categories.nama_kategori, count(umkms.id) as count')
                ->groupBy('categories.nama_kategori')
                ->get()
        ];
        return response()->json($stats);
    }
}
