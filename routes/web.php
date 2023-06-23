<?php

use App\Http\Controllers\Backend\PusatController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
<<<<<<< HEAD
        return view('admin.index');
    })->name('dashboard');
});




Route::prefix('pusats')->group(function(){
    Route::get('/pusat/view',[PusatController::class, 'PusatView'])->name('pusat.view');
});
=======
        return view('dashboard');
    })->name('dashboard');
});
>>>>>>> 46a9d1df2194901e7909eb829e97eb3caa47d823
