<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;

class PenjualanController extends Controller
{
    public function index()
    {
        //get all penjualans from Models
        $penjualans = penjualan::latest()->get();
        $detail_penjualan = DetailPenjualan::all();
        $user = User::all();
        

        //return view with data
        return view('penjualan.index', compact('penjualans', 'user', 'detail_penjualan'));
    }
    
}
