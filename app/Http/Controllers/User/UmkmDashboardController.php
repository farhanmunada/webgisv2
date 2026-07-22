<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Umkm;
use App\Models\Category;
use App\Notifications\UmkmDeactivatedSelfNotification;
use App\Notifications\UmkmReactivatedNotification;
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

        // Ditangguhkan admin — tidak bisa reaktivasi mandiri
        if ($umkm->status === 'suspended') {
            return view('user.dashboard-suspended', compact('umkm'));
        }

        // Dinonaktifkan mandiri — bisa aktifkan kembali sendiri
        if ($umkm->status === 'inactive') {
            return view('user.dashboard-inactive', compact('umkm'));
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

    /**
     * Nonaktifkan UMKM secara mandiri oleh pemilik.
     */
    public function deactivate()
    {
        $umkm = Umkm::where('user_id', Auth::id())->firstOrFail();

        // Hanya UMKM yang approved yang bisa dinonaktifkan
        if ($umkm->status !== 'approved') {
            return back()->with('error', 'UMKM tidak dapat dinonaktifkan pada status saat ini.');
        }

        $umkm->update(['status' => 'inactive']);

        Auth::user()->notify(new UmkmDeactivatedSelfNotification($umkm));

        return redirect()->route('dashboard')->with('success', 'UMKM Anda berhasil dinonaktifkan.');
    }

    /**
     * Aktifkan kembali UMKM yang dinonaktifkan mandiri (hanya status inactive).
     * UMKM yang suspended tidak bisa reaktivasi mandiri.
     */
    public function reactivate()
    {
        $umkm = Umkm::where('user_id', Auth::id())->firstOrFail();

        // Hanya bisa reaktivasi jika status 'inactive' (bukan 'suspended')
        if ($umkm->status !== 'inactive') {
            abort(403, 'Anda tidak memiliki izin untuk mengaktifkan kembali UMKM ini.');
        }

        $umkm->update(['status' => 'approved']);

        Auth::user()->notify(new UmkmReactivatedNotification($umkm));

        return redirect()->route('dashboard')->with('success', 'UMKM Anda berhasil diaktifkan kembali!');
    }
}
