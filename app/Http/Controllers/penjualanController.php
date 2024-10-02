<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penjualan;

class penjualanController extends Controller
{
    public function show() {
        $penjualan = penjualan::all();
        return view('penjualan', compact('penjualan'));
    }
}
