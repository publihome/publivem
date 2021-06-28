<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;

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


Route::resource('/', DashboardController::class);
Route::resource('/products', ProductsController::class)->except('index');
Route::get('/products_by_category', [ProductsController::class,'index']);
Route::get('/products/category/{category_id}', [ProductsController::class,'producstByCategory']);