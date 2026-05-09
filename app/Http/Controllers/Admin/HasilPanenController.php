<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilPanen;
use Illuminate\Http\Request;

class HasilPanenController extends Controller
{
    public function index()
    {
        $hasil_panen = HasilPanen::all();
        return view('admin.hasil-panen.index', compact('hasil_panen'));
    }

    public function create()
    {
        return view('admin.hasil-panen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:100|unique:hasil_panens',
            'hasil_robusta' => 'required|integer|min:0',
            'hasil_arabika' => 'required|integer|min:0',
        ]);

        HasilPanen::create($request->all());

        return redirect()->route('admin.hasil-panen.index')->with('success', 'Data hasil panen berhasil ditambahkan.');
    }

    public function edit(HasilPanen $hasil_panen)
    {
        return view('admin.hasil-panen.edit', compact('hasil_panen'));
    }

    public function update(Request $request, HasilPanen $hasil_panen)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:100|unique:hasil_panens,kecamatan,' . $hasil_panen->id,
            'hasil_robusta' => 'required|integer|min:0',
            'hasil_arabika' => 'required|integer|min:0',
        ]);

        $hasil_panen->update($request->all());

        return redirect()->route('admin.hasil-panen.index')->with('success', 'Data hasil panen berhasil diperbarui.');
    }

    public function destroy(HasilPanen $hasil_panen)
    {
        $hasil_panen->delete();
        return redirect()->route('admin.hasil-panen.index')->with('success', 'Data hasil panen berhasil dihapus.');
    }
}
