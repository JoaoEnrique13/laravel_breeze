<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CADASTRAR CLIENTE
    Route::get('/register-client', [ClientController::class, 'register'])->name('register_client');
    Route::post('/register-client', [ClientController::class, 'store'])->name('client.register');

    Route::get('/list-client', [ClientController::class, 'listClient'])->name('client.list');// LISTAR CLIENTE
    Route::get('/delete-client/{id}', [ClientController::class, 'delete'])->name('client.delete'); // apagar cliente

    // EDITAR CLIENTE
    Route::get('/edit-client/{id}', [ClientController::class, 'edit'])->name('client.edit');
    Route::post('/edit-client', [ClientController::class, 'update'])->name('client.update');
});

require __DIR__.'/auth.php';
