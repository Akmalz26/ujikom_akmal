<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\User;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$penjualans = Penjualan::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();
        $users = User::all();

    	return view('history.index', compact('penjualans','users'));
    }

    public function detail($id)
    {
    	$penjualan = Penjualan::where('id', $id)->first();
    	$detail_penjualans = DetailPenjualan::where('penjualan_id', $penjualan->id)->get();
        $users = User::all();


     	return view('history.detail', compact('penjualan','detail_penjualans','users'));
    }
}
