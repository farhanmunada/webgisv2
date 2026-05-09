<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umkm;
use App\Models\Category;

class UmkmRegistrationController extends Controller
{
    public function create()
    {
        if (Umkm::where('user_id', auth()->id())->exists()) {
            return redirect()->route('dashboard');
        }

        $categories = Category::all();
        $kecamatans = [
            'Bansari', 'Bejen', 'Bulu', 'Candiroto', 'Gemawang', 
            'Jumo', 'Kaloran', 'Kandangan', 'Kedu', 'Kledung', 
            'Kranggan', 'Ngadirejo', 'Parakan', 'Pringsurat', 'Selopampang', 
            'Temanggung', 'Tembarak', 'Tlogomulyo', 'Tretep', 'Wonoboyo'
        ];
        return view('user.umkm.register', compact('categories', 'kecamatans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'kategori_id' => 'required|exists:categories,id',
            'kecamatan' => 'required|string',
            'latitude' => 'required',
            'longitude' => 'required',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120', // Increased to 5MB
            'deskripsi' => 'nullable|string',
        ]);

        $data = $request->except('foto');
        $data['user_id'] = auth()->id();
        $data['status'] = 'pending';

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('umkm', 'public');
            $data['foto'] = $path;
        }

        Umkm::create($data);

        return redirect()->route('dashboard')->with('success', 'Pendaftaran UMKM berhasil dikirim dan sedang menunggu persetujuan admin.');
    }
}
