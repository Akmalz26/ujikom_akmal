<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Penjualan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PenjualanController extends Controller
{
    public function index()
    {
        //get all penjualans from Models
        $penjualans = penjualan::latest()->get();
        $users = User::all();
        

        //return view with data
        return view('backend.penjualan.index', compact('penjualans', 'users'));
    }
    
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'tanggal'     => 'required',
            'total_harga'     => 'required',
            'pelanggan_id'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        //create penjualan
        $penjualan = penjualan::create([
            'tanggal'     => $request->tanggal, 
            'total_harga'     => $request->total_harga, 
            'pelanggan_id'     => $request->pelanggan_id, 
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $penjualan  
        ]);
    }

    public function show(penjualan $penjualan)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data penjualan',
            'data'    => $penjualan  
        ]); 
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $penjualan
     * @return void
     */
    public function update(Request $request, penjualan $penjualan)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'tanggal'     => 'required',
            'total_harga'     => 'required',
            'pelanggan_id'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create penjualan
        $penjualan->update([
            'tanggal'     => $request->tanggal, 
            'total_harga'     => $request->total_harga, 
            'pelanggan_id'     => $request->pelanggan_id, 
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $penjualan  
        ]);
    }

    public function destroy($id)
    {
        //delete penjualan by ID
        penjualan::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data penjualan Berhasil Dihapus!.',
        ]); 
    }
}
