<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;

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

/**店舗一覧ページ */
Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/search', [ShopController::class, 'search'])->name('shop.search');
Route::get('/detail/{name}', [ShopController::class, 'detail'])->name('shop.detail');

/**お気に入り機能 */
Route::group(['middleware' => 'auth'], function () {
    Route::post('/shop/{shop}favorite', [FavoriteController::class, 'create'])->name('favorite.create');
    Route::post('/shop/{shop}/unfavorite', [FavoriteController::class, 'delete'])->name('favorite.delete');
});

/**会員登録完了 */
Route::get('/thanks', function () {
    return view('thanks');
});
