<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmApprovalController extends Controller
{
    public function index()
    {
        $umkms = Umkm::with(['user', 'category'])->where('status', 'pending')->latest()->paginate(10);
        return view('admin.umkm.approval', compact('umkms'));
    }

    public function approve(Umkm $umkm)
    {
        $umkm->update(['status' => 'approved']);
        return back()->with('success', "UMKM {$umkm->nama_umkm} berhasil di-approve.");
    }

    public function reject(Umkm $umkm)
    {
        $nama = $umkm->nama_umkm;
        if ($umkm->foto) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($umkm->foto);
        }
        $umkm->delete(); // Data dihapus sesuai PRD
        return back()->with('success', "UMKM {$nama} telah ditolak dan datanya dihapus.");
    }
}
