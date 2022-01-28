<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
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
    return view('welcome');
});
Route::get('halaman_utama', function () {
    return view('dashboard');
});
// Route::get('barang', 'BarangController@index');
// Route::post('barang', 'BarangController@create');
Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang', [BarangController::class, 'create']);
Route::get('/barang/edit/{id}', [BarangController::class, 'edit']);
Route::patch('/barang/{id}', [BarangController::class, 'update']);

Route::get('/in_barang', [BarangController::class, 'show']);

