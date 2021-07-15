<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\SalesController;


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

Route::get('/', function () {
    return redirect('/dashboard');
    
});
Route::get('/dashboard', [DashboardController::class,'index']);
Route::resource('/products', ProductsController::class)->except(['index', 'update']);
Route::resource('/employees', EmployeesController::class);
Route::resource('/expenses', ExpensesController::class);
Route::get('/products_by_category', [ProductsController::class,'index']);
Route::get('/products/category/{category_id}', [ProductsController::class,'producstByCategory']);

Route::resource('/sales', SalesController::class);
