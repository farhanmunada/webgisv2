<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $umkm = $this->getUmkm();
        $products = Product::where('umkm_id', $umkm->id)->latest()->paginate(10);
        return view('user.products.index', compact('products'));
    }

    private function getUmkm()
    {
        return Umkm::where('user_id', Auth::id())->firstOrFail();
    }

    public function create()
    {
        return view('user.products.create');
    }

    public function store(Request $request)
    {
        $umkm = $this->getUmkm();

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['umkm_id'] = $umkm->id;

        if ($request->hasFile('foto_produk')) {
            $data['foto_produk'] = $request->file('foto_produk')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('dashboard')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $umkmProduct)
    {
        if ($umkmProduct->umkm_id !== $this->getUmkm()->id) {
            abort(403);
        }
        return view('user.products.edit', ['product' => $umkmProduct]);
    }

    public function update(Request $request, Product $umkmProduct)
    {
        if ($umkmProduct->umkm_id !== $this->getUmkm()->id) {
            abort(403);
        }

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_produk')) {
            if ($umkmProduct->foto_produk) {
                Storage::disk('public')->delete($umkmProduct->foto_produk);
            }
            $data['foto_produk'] = $request->file('foto_produk')->store('products', 'public');
        }

        $umkmProduct->update($data);

        return redirect()->route('dashboard')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $umkmProduct)
    {
        if ($umkmProduct->umkm_id !== $this->getUmkm()->id) {
            abort(403);
        }

        if ($umkmProduct->foto_produk) {
            Storage::disk('public')->delete($umkmProduct->foto_produk);
        }

        $umkmProduct->delete();

        return back()->with('success', 'Produk berhasil dihapus.');
    }
}
