<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
class HomeController extends Controller
{
    public function index()
    {
        //get all produks from Models
        $produks = Produk::latest()->get();

        //return view with data
        return view('frontend.home', compact('produks'));
    }
}