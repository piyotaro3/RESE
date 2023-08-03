<?php

use App\Http\Controllers\ReserveController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ReviewController;

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
Route::get('/review/{name}', [ShopController::class, 'review'])->name('shop.review');
Route::get('/thanks', function () {
    return view('done');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/shop/{shop}favorite', [FavoriteController::class, 'create'])->name('favorite.create');
    Route::post('/shop/{shop}/unfavorite', [FavoriteController::class, 'delete'])->name('favorite.delete');
    Route::post('reserve', [ReserveController::class, 'reserve'])->name('reserve.create');
    Route::get('done', function () {
        return view('done');
    });
    Route::get('/mypage', [MypageController::class, 'show'])->name('mypage.show');
    Route::get('/history', [ReviewController::class, 'history'])->name('history.show');
    Route::get('/review', [ReviewController::class, 'review_show'])->name('review.show');
    Route::post('/review', [ReviewController::class, 'review'])->name('review.review');
    Route::get('/review_edit', [ReviewController::class, 'edit_show'])->name('review.edit_show');
    Route::post('/review_edit/{id}', [ReviewController::class, 'edit'])->name('review.edit');
    Route::post('/review_delete', [ReviewController::class, 'delete'])->name('review.delete');
    Route::post('/cancel', [ReserveController::class, 'cancel'])->name('reserve.cancel');
    Route::get('/update', [ReserveController::class, 'update_view']);
    Route::post('/update', [ReserveController::class, 'update'])->name('reserve.update');
});
