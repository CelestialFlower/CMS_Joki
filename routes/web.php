<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/page', [FrontController::class, 'page'])->name('page');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::view('/', 'fronted.home')->name('home');
Route::view('/game', 'fronted.game')->name('game');


// logika navbar

route::get('/home', [FrontController::class, 'home'])->name('fronted.home');
route::get('/game', [FrontController::class, 'game'])->name('fronted.game');
route::get('/artikel', [FrontController::class, 'artikel'])->name('fronted.artikel');
route::get('/tentang', [FrontController::class, 'tentang'])->name('fronted.tentang');
route::get('/kontak', [FrontController::class, 'kontak'])->name('fronted.kontak');