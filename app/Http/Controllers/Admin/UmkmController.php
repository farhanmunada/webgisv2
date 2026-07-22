<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use App\Notifications\UmkmSuspendedNotification;
use App\Notifications\UmkmReactivatedNotification;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    protected $kecamatans = [
        'Bansari', 'Bejen', 'Bulu', 'Candiroto', 'Gemawang', 
        'Jumo', 'Kaloran', 'Kandangan', 'Kedu', 'Kledung', 
        'Kranggan', 'Ngadirejo', 'Parakan', 'Pringsurat', 'Selopampang', 
        'Temanggung', 'Tembarak', 'Tlogomulyo', 'Tretep', 'Wonoboyo'
    ];

    public function index()
    {
        $umkms = Umkm::with('category')->latest()->paginate(10);
        return view('admin.umkm.index', compact('umkms'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        $kecamatans = $this->kecamatans;
        return view('admin.umkm.create', compact('categories', 'kecamatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'kategori_id' => 'nullable|exists:categories,id',
            'kecamatan' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'deskripsi' => 'nullable|string',
        ]);

        $data = $request->except('foto');
        $data['user_id'] = auth()->id();
        $data['status'] = 'approved';

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('umkm', 'public');
        }

        Umkm::create($data);

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil ditambahkan.');
    }

    public function edit(Umkm $umkm)
    {
        $categories = \App\Models\Category::all();
        $kecamatans = $this->kecamatans;
        return view('admin.umkm.edit', compact('umkm', 'categories', 'kecamatans'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'kategori_id' => 'nullable|exists:categories,id',
            'kecamatan' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'deskripsi' => 'nullable|string',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($umkm->foto) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($umkm->foto);
            }
            $data['foto'] = $request->file('foto')->store('umkm', 'public');
        }

        $umkm->update($data);

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil diperbarui.');
    }

    public function destroy(Umkm $umkm)
    {
        if ($umkm->foto) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($umkm->foto);
        }
        $umkm->delete();
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil dihapus.');
    }

    /**
     * Tangguhkan UMKM oleh admin — pemilik tidak bisa reaktivasi mandiri.
     */
    public function suspend(Umkm $umkm)
    {
        $umkm->update(['status' => 'suspended']);

        if ($umkm->user) {
            $umkm->user->notify(new UmkmSuspendedNotification($umkm));
        }

        return back()->with('success', "UMKM {$umkm->nama_umkm} berhasil ditangguhkan.");
    }

    /**
     * Aktifkan kembali UMKM yang suspended atau inactive (oleh admin).
     */
    public function reactivate(Umkm $umkm)
    {
        $umkm->update(['status' => 'approved']);

        if ($umkm->user) {
            $umkm->user->notify(new UmkmReactivatedNotification($umkm));
        }

        return back()->with('success', "UMKM {$umkm->nama_umkm} berhasil diaktifkan kembali.");
    }
}
