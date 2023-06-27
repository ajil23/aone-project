<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\PusatController;
use App\Http\Controllers\Backend\NakesController;
use App\Http\Controllers\Backend\AmbulanceController;
use App\Http\Controllers\Backend\PasienController;
use App\Http\Controllers\Backend\PenggunaController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[SesiController::class,'index']);
Route::post('/',[SesiController::class,'login']);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [AdminController::class, 'perform'])->name('logout.perform');
 });
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/nakes/view',[NakesController::class, 'NakesView'])->name('nakes.view');
    Route::get('/ambulance/view',[AmbulanceController::class, 'AmbulanceView'])->name('ambulance.view');
    Route::get('/pusat/view',[PusatController::class, 'PusatView'])->name('pusat.view');
    Route::get('/pasien/view',[PasienController::class, 'PasienView'])->name('pasien.view');
    Route::get('/pengguna/view',[PenggunaController::class, 'PenggunaView'])->name('pengguna.view');
});