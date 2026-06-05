<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Umkm;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UmkmDashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $user = Auth::user();
        $umkm = Umkm::with('category')->where('user_id', $user->id)->first();

        if (!$umkm) {
            return redirect()->route('umkm.register')->with('info', 'Anda harus mendaftarkan UMKM terlebih dahulu.');
        }

        if ($umkm->status === 'pending') {
            return view('user.dashboard-pending', compact('umkm'));
        }

        $stats = [
            'total_products' => Product::where('umkm_id', $umkm->id)->count(),
            'total_views' => 0, // Placeholder
        ];

        $products = Product::where('umkm_id', $umkm->id)->latest()->paginate(10);

        return view('user.dashboard', compact('umkm', 'stats', 'products'));
    }

    public function editProfile()
    {
        $umkm = Umkm::where('user_id', Auth::id())->firstOrFail();
        $categories = Category::all();
        $kecamatans = [
            'Bansari', 'Bejen', 'Candiroto', 'Bulu', 'Gemawang', 
            'Jumo', 'Kaloran', 'Kandangan', 'Kedu', 'Kledung', 
            'Kranggan', 'Ngadirejo', 'Parakan', 'Pringsurat', 'Selopampang', 
            'Temanggung', 'Tembarak', 'Tlogomulyo', 'Tretep', 'Wonoboyo'
        ];
        return view('user.umkm.edit', compact('umkm', 'categories', 'kecamatans'));
    }

    public function updateProfile(Request $request)
    {
        $umkm = Umkm::where('user_id', Auth::id())->firstOrFail();
        
        $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'kategori_id' => 'required|exists:categories,id',
            'kecamatan' => 'required',
            'alamat' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['nama_umkm', 'kategori_id', 'kecamatan', 'alamat', 'latitude', 'longitude', 'deskripsi']);

        if ($request->hasFile('foto')) {
            if ($umkm->foto) {
                Storage::disk('public')->delete($umkm->foto);
            }
            $data['foto'] = $request->file('foto')->store('umkm', 'public');
        }

        $umkm->update($data);

        return back()->with('success', 'Profil UMKM berhasil diperbarui.');
    }
}
