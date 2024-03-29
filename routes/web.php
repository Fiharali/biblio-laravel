<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReseravtionController;
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









Route::middleware(['auth','admin'])->group(function () {

    Route::prefix('admin')->group(function () {

Route::resource('projects', ProjectController::class);





        Route::get('register', [RegisteredUserController::class, 'create']) ->name('register');
        Route::post('register', [RegisteredUserController::class, 'store'])->name('users.store');
        Route::get('users', [RegisteredUserController::class, 'index'])->name('users.index');
        Route::get('users/{user}/edit', [RegisteredUserController::class, 'edit'])->name('users.edit');
        Route::put('users/{user}', [RegisteredUserController::class, 'update'])->name('users.update');
        Route::delete('users/{user}', [RegisteredUserController::class, 'destroy'])->name('users.destroy');



    });
});







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
