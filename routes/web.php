<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [OrderController::class, 'index'])->name('index');

/*Route::get('/', function () {
    return view('pages.orders.index');
});*/

Route::get('/create', function () {
    return view('pages.orders.form');
});

Route::get('/edit', function () {
    return view('pages.orders.form');
});

Route::get('/report', function () {
    return view('pages.orders.report');
});
