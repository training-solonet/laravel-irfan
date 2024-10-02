<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detail_penjualan;

class detail_penjualanController extends Controller
{
    public function show() {
        $detail_penjualan = detail_penjualan::all();
        return view('detail_penjualan', compact('detail_penjualan'));
    }
}
