<?php

use App\Http\Controllers\DetailPenjualanConroller;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');;
	// Route::get('dashboard', function () {
	// 	return view('dashboard');
	// })->name('dashboard');

	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
	
	
	Route::resource('user-management', UserController::class);
	Route::resource('produk', ProdukController::class);
	Route::resource('penjualan', PenjualanController::class);
	Route::resource('detail-penjualan', DetailPenjualanConroller::class);
	
});

Route::get('/logout', [SessionsController::class, 'destroy']);


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

	
	
});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');


Route::get('/', 'App\Http\Controllers\Frontend\HomeController@index')->name('home');
Route::get('shop', 'App\Http\Controllers\Frontend\HomeController@shop')->name('shop');

Route::get('pesan/{id}', 'App\Http\Controllers\PesanController@index');
Route::post('pesan/{id}', 'App\Http\Controllers\PesanController@pesan');
Route::get('cart', 'App\Http\Controllers\PesanController@check_out')->name('cart');
Route::delete('cart/{id}', 'App\Http\Controllers\PesanController@delete');
Route::post('update-quantity/{id}', 'App\Http\Controllers\PesanController@updateQuantity')->name('update.quantity');


Route::get('konfirmasi-check-out', 'App\Http\Controllers\PesanController@konfirmasi');

Route::get('profile', 'App\Http\Controllers\ProfileController@index')->name('profile');
Route::post('profile', 'App\Http\Controllers\ProfileController@store');

Route::get('history', 'App\Http\Controllers\HistoryController@index')->name('history');
Route::get('history/{id}', 'App\Http\Controllers\HistoryController@detail');

