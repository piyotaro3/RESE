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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/thanks', function () {
    return view('thanks');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/test', [ShopController::class, 'view']); //view確認のルート*/
<<<<<<< HEAD
Route::get('/search', [ShopController::class, 'search']);

Route::post('/shop/{shop}favorite', [FavoriteController::class, 'create'])->name('favorite.create');
Route::post('/shop/{shop}/unfavorite', [FavoriteController::class, 'delete'])->name('favorite.delete');

=======

Route::post('/shop/{shop}favorite', [FavoriteController::class, 'create'])->name('favorite.create');
Route::post('/shop/{shop}/unfavorite', [FavoriteController::class, 'delete'])->name('favorite.delete');
>>>>>>> 09291019431c5adfbc46a15576a06ae2f585951d
