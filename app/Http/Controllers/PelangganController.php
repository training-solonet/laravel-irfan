<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pelanggan;

class PelangganController extends Controller
{
    public function show() {
        $pelanggan = pelanggan::all();
        return view('pelanggan', compact('pelanggan'));
    }
}
