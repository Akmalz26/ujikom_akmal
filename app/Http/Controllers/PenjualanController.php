<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    public function index()
    {
        //get all penjualans from Models
        $penjualans = penjualan::latest()->get();
        $users = User::all();
        

        //return view with data
        return view('penjualan.index', compact('penjualans', 'users'));
    }
    
}
