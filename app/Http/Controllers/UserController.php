<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    $user = User::all();
    return view("user-management.index", compact("user"));
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'     => 'required|email',
            'password'     => 'required|min:5|max:12',
            'role'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        $user = user::create([
            'name'     => $request->name, 
            'email'   => $request->email,
            'password' =>  bcrypt($request->password),
            'role'   => $request->role,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $user  
        ]);
    }

    
    public function show(User $user)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data user',
            'data'    => $user  
        ]); 
    }
    
    public function update(Request $request, user $user)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'name'     => 'required',
        'email'     => 'required|email',
        'password'     => 'required|min:5|max:12',
        'role'   => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Menggunakan bcrypt untuk mengenkripsi password
    $hashedPassword = bcrypt($request->password);

    // Update informasi pengguna
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $hashedPassword; // Simpan password yang sudah di-hash
    $user->role = $request->role;
    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'Data Berhasil Diupdate!',
        'data' => $user
    ]);
}

    public function destroy($id)
    {
        //delete user by ID
        User::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data user Berhasil Dihapus!.',
        ]); 
    }
}
