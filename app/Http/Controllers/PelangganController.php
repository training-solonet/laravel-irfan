<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pelanggan;

class PelangganController extends Controller
{
    public function index() {
        $pelanggan = pelanggan::all();
        return view('pelanggan', compact('pelanggan'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|numeric',
        ]);

        pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|numeric',
        ]);
    
        $pelanggan = pelanggan::find($id);
        $pelanggan->update($request->all());
    
        return redirect()->route('pelanggan.index')->with('success', 'pelagggan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $pelanggan = pelanggan::find($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'pelanggan berhasil dihapus.');
    }
}
