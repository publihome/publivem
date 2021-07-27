<?php

use App\Http\Controllers\Controller;
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
    return redirect('/login');
    
});
Route::get('/login', [Controller::class, 'login'])->name('login');
Route::POST('/login', [Controller::class, 'validate']);
Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');
Route::resource('/products', ProductsController::class)->except(['index'])->middleware('auth');;
Route::resource('/employees', EmployeesController::class)->middleware('auth');;
Route::resource('/expenses', ExpensesController::class)->middleware('auth');;
Route::get('/products_by_category', [ProductsController::class,'index'])->middleware('auth');;
Route::get('/products/category/{category_id}', [ProductsController::class,'producstByCategory'])->middleware('auth');;

Route::resource('/sales', SalesController::class)->middleware('auth');;
