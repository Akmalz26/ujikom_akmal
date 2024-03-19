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
    return view("laravel-examples/user-management", compact("user"));
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
}
