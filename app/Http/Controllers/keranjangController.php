<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keranjang;
use App\Models\barang;
class keranjangController extends Controller
{
    public function index() {
        $keranjang = keranjang::all();
        return view('keranjang', compact('keranjang'));
    }

    public function destroy($id)
    {
        $keranjang = keranjang::find($id);
        $keranjang->delete();

        return redirect()->route('keranjang.index')->with('success', 'keranjang berhasil dihapus.');
    }

    // Controller Method
public function showTransaksiPenjualan()
{
    // Retrieve all items from the barang table
    $barangs = Barang::all(); // Make sure to replace 'Barang' with your actual model name

    // Pass the barangs variable to the view
    return view('keranjang', compact( 'barang')); // Replace 'your_view_name' with the actual view name
}

}
