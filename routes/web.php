<?php

use App\Http\Controllers\Administrator\UsersController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
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
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfilController::class, 'profil']);
    Route::put('/profil/info/update', [ProfilController::class, 'profil_info_update']);
    Route::put('/profil/password/update', [ProfilController::class, 'profil_password_update']);
});

require __DIR__ . '/auth.php';

Route::middleware('auth', 'cekRole:Administrator')->group(function () {
    Route::auto('/administrator/users', UsersController::class);
});

Route::middleware('auth', 'cekRole:Pustakawan')->group(function () {
});
