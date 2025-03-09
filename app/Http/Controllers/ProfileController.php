<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$user = User::where('id', Auth::user()->id)->first();

    	return view('frontend.profile', compact('user'));
    }

    public function store(Request $request)
{
    $attributes = request()->validate([
        'name' => ['required', 'max:50'],
        'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
        'phone' => ['max:50'],
        'location' => ['max:70'],
        'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // max 2MB for example
    ]);

    // Validate if email is changed
    if ($request->email != Auth::user()->email) {
        request()->validate([
            'email' => ['required', 'email', 'max:50', Rule::unique('users')],
        ]);
    }

    // Handle image upload
    $imageName = Auth::user()->image; // Default to current image
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('image'), $imageName);
    }

    // Update user profile
    $user = User::find(Auth::user()->id);
    $user->name = $attributes['name'];
    $user->email = $attributes['email'];
    $user->phone = $attributes['phone'];
    $user->location = $attributes['location'];
    $user->image = $imageName;
    $user->save();

    return redirect('/profile')->with('success', 'Profile updated successfully');
}

}