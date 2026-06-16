<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;

/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontController::class, 'home'])->name('fronted.home');
Route::get('/game', [FrontController::class, 'game'])->name('fronted.game');
Route::get('/artikel', [FrontController::class, 'artikel'])->name('fronted.artikel');
Route::get('/tentang', [FrontController::class, 'tentang'])->name('fronted.tentang');
Route::get('/kontak', [FrontController::class, 'kontak'])->name('fronted.kontak');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {

        if(auth()->user()->role === 'admin'){
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');

    })->name('dashboard');

});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::view(
        '/admin/dashboard',
        'admin.dashboard'
    )->name('admin.dashboard');

});
route::get('/admin/penjoki', [FrontController::class, 'penjoki'])->name('admin.penjoki');
route::get('/admin/costumer', [FrontController::class, 'costumer'])->name('admin.costumer');
/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::view(
        '/user/dashboard',
        'user.dashboard'
    )->name('user.dashboard');

});
route::get('/user/order', [FrontController::class, 'order'])->name('user.order');
route::get('/user/riwayat', [FrontController::class, 'riwayat'])->name('user.riwayat');
route::get('/user/status-order', [FrontController::class, 'status'])->name('user.status');  



/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile',
        [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile',
        [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile',
        [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';