<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class detail_penjualanController extends Controller
{
    public function index()
    {
        $detail_penjualan = detail_penjualan::all();
        return view('detail_penjualan', compact('detail_penjualan'));
    }
}
