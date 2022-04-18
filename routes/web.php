<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kasir;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/cencel', function () {
    dump('cencel');
});

    Route::get('/', [Kasir::class, 'makeorder']);
    Route::get('/produk', [Kasir::class, 'makeorder']);
    //
    Route::get('/makeorder', [Kasir::class, 'makeorder']);
    Route::get('/chart', [Kasir::class, 'chart']);
    Route::get('/struck', [Kasir::class, 'make_struck']);
    Route::post('/tes1', [Kasir::class, 'jsoncek']);
    Route::get('/cliend', [Kasir::class, 'index']);
    Route::get('/liststruck', [Kasir::class, 'list_struck']);
    Route::get('/idopin', [Kasir::class, 'idopin']);


Route::group(['prefix' => '/admin'], function () {
    Voyager::routes();
    Route::get('/export', [Kasir::class, 'export']);
});
