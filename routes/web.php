<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\models\user;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontController::class, 'home'])->name('fronted.home');
Route::get('/game', [FrontController::class, 'game'])
    ->name('game');
    Route::get('/game', [FrontController::class, 'game'])
    ->name('fronted.game');
Route::get('/artikel', [FrontController::class, 'artikel'])->name('fronted.artikel');
Route::get('/tentang', [FrontController::class, 'tentang'])->name('fronted.tentang');
Route::get('/kontak', [FrontController::class, 'kontak'])->name('fronted.kontak');

/*|--------------------------------------------------------------------------
| order
|--------------------------------------------------------------------------*/
Route::middleware(['auth'])->group(function () {

    Route::get(
        '/user/order',
        [OrderController::class,'index']
    )->name('user.order');

    Route::post(
        '/user/order',
        [OrderController::class,'store']
    )->name('user.order.store');

});

/*|--------------------------------------------------------------------------
| game
|--------------------------------------------------------------------------*/
Route::get('/game/{id}', [FrontController::class, 'showGame'])
    ->name('fronted.game.show');

/*
|--------------------------------------------------------------------------
| artikel
|--------------------------------------------------------------------------
*/


Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get(
            '/kelolaartikel',
            [ArtikelController::class, 'index']
        )->name('kelolaartikel');

        Route::post(
            '/artikel',
            [ArtikelController::class, 'store']
        )->name('artikel.store');

    });
Route::put('/admin/artikel/{artikel}', [ArtikelController::class,'update'])
    ->name('admin.artikel.update');

Route::delete('/admin/artikel/{artikel}', [ArtikelController::class,'destroy'])
    ->name('admin.artikel.destroy');
Route::get('/artikel/{id}', [FrontController::class, 'showArtikel'])
    ->name('fronted.artikel.show');
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
Route::get('/admin/dashboard',
    [FrontController::class,'dashboard'])
    ->name('admin.dashboard');
route::get('/admin/penjoki', [FrontController::class, 'penjoki'])->name('admin.penjoki');
route::get('/admin/costumer', [FrontController::class, 'costumer'])->name('admin.costumer');
Route::put(
    '/admin/costumer/{user}/status',
    [FrontController::class, 'ubahStatus']
)->name('admin.costumer.status');
route::get('/admin/kelolagame', [FrontController::class, 'kelolagame'])->name('admin.kelolagame');
route::get('/admin/kelolaorder', [FrontController::class, 'kelolaorder'])->name('admin.kelolaorder');
route::get('/admin/kelolapromo', [FrontController::class, 'kelolapromo'])->name('admin.kelolapromo');
route::put('/admin/kelolagame/{game}', [GameController::class, 'update'])->name('admin.kelolagame.update');
Route::put(
    '/admin/order/{order}',
    [FrontController::class, 'updateOrder']
)->name('admin.order.update');
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('games', GameController::class);

    });

    Route::get(
    '/admin/kelolagame',
    [GameController::class, 'index']
)->name('admin.kelolagame');

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
Route::get(
    '/user/order',
    [OrderController::class, 'index']
)->name('user.order');
route::get('/user/riwayat', [FrontController::class, 'riwayat'])->name('user.riwayat');
route::get('/user/status-order', [FrontController::class, 'status'])->name('user.status');  
Route::get(
    '/user/riwayat',
    [OrderController::class,'riwayat']
)->name('user.riwayat');



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