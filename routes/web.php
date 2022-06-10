<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/import_categories', [CategoryController::class, 'create']);
Route::post('/import_categories', [CategoryController::class, 'store'])->name('import_categories.store');
Route::post('/import_products', [ProductController::class, 'store'])->name('import_products.store');
