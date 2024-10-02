<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keranjang;

class keranjangController extends Controller
{
    public function show() {
        $keranjang = keranjang::all();
        return view('keranjang', compact('keranjang'));
    }
}
