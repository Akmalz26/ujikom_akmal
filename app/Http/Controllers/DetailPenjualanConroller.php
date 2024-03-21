<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\User;
use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class DetailPenjualanConroller extends Controller
{
    public function index() {
        $detailPenjualans = DetailPenjualan::latest()->get();
        $users = User::all();
        $produk = Produk::all();
        $penjualan = Penjualan::all();
        
        return view('detail-penjualan.index', compact( 'detailPenjualans', 'users','produk', 'penjualan'));
    }
    
}
