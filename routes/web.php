<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/maps', function () {
    return view('maps');
});

Route::get('/map', function () {
    return view('map');
});

Auth::routes();

Route::get('/register', function () {
    return redirect()->route('login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profil', [App\Http\Controllers\HomeController::class, 'profil'])->name('profil');
Route::put('/change-profil/{id}', [App\Http\Controllers\HomeController::class, 'changeProfil'])->name('change.profil');

Route::get('/password-change', [App\Http\Controllers\HomeController::class, 'password']);
Route::put('/password-change/{id}', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change.password');
