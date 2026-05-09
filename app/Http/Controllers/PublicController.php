<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PublicController extends Controller
{
    public function katalog(Request $request)
    {
        $query = Product::with(['umkm', 'umkm.category']);

        if ($request->filled('search')) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%')
                  ->orWhereHas('umkm', function($q) use ($request) {
                      $q->where('nama_umkm', 'like', '%' . $request->search . '%');
                  });
        }

        if ($request->filled('category')) {
            $query->whereHas('umkm', function($q) use ($request) {
                $q->where('kategori_id', $request->category);
            });
        }

        $products = $query->latest()->paginate(12)->withQueryString();
        $categories = \App\Models\Category::all();

        return view('public.katalog', compact('products', 'categories'));
    }

    public function showProduct(Product $product)
    {
        $product->load(['umkm', 'umkm.category']);
        return view('public.product-detail', compact('product'));
    }

    public function showUmkm(\App\Models\Umkm $umkm)
    {
        $umkm->load(['products', 'category']);
        return view('public.umkm-detail', compact('umkm'));
    }
}
