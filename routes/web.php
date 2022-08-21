<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;//追記

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

// Route::get('/items', [ItemController::class, 'index']);
// Route::get('/items/index', [ItemController::class, 'index']);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// items用の一括ルーティング
// Route::resource('items', ItemController::class);


//SPAなのでどんなURLだったとしても/views/test.blade.phpを表示するように設定
//https://qiita.com/morry_48/items/abd620f051fb4f36dcc2

Auth::routes();
Route::get('/{any}', function () {
    return view('test');
})->where('any','.*');
