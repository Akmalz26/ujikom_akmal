<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $totalProduk = Produk::count();
    $totalPenjualan = Penjualan::count();

    return view('dashboard', compact('totalProduk', 'totalPenjualan'));
}
}
