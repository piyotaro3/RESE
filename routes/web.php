<?php

use App\Http\Controllers\ReserveController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MypageController;

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

require __DIR__ . '/auth.php';

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/search', [ShopController::class, 'search'])->name('shop.search');
Route::get('/detail/{name}', [ShopController::class, 'detail'])->name('shop.detail');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/shop/{shop}favorite', [FavoriteController::class, 'create'])->name('favorite.create');
    Route::post('/shop/{shop}/unfavorite', [FavoriteController::class, 'delete'])->name('favorite.delete');
});

Route::get('/thanks', function () {
    return view('thanks');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('reserve', [ReserveController::class, 'reserve'])->name('reserve.create');
    Route::get('reserve/OK', function () {
        return view('reserve');
    });
    Route::get('/mypage', [MypageController::class, 'show'])->name('mypage.show');
    Route::post('/cancel', [ReserveController::class, 'cancel'])->name('reserve.cancel');
    Route::get('/update', [ReserveController::class, 'update_view']);
    Route::post('/update', [ReserveController::class, 'update'])->name('reserve.update');
});
