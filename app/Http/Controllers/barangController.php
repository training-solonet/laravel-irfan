<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;

class barangController extends Controller
{
    public function show() {
        $barang = Barang::all();
        return view('barang', compact('barang'));
    }
}
