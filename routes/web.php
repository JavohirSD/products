<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/create', [ProductsController::class, 'create'])->name('create');
Route::post('/store', [ProductsController::class, 'store'])->name('store');
Route::get('/delete/{id}', [ProductsController::class, 'delete'])->name('delete');
Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ProductsController::class, 'update'])->name('update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
