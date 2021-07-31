<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::post('/dashboard', [DashboardController::class, 'getInformation']);

Route::get('/products/{category_id}',[ProductsController::class,'show']);
Route::get('/products/{category_id}/{id}',[ProductsController::class,'edit']);
Route::post('/products',[ProductsController::class,'store']);
Route::put('/products/{product_id}',[ProductsController::class,'update']);

Route::delete('/products/{product_id}',[ProductsController::class,'destroy']);


Route::get('/employees/{id}', [EmployeesController::class,'show']);
Route::get('/employees', [EmployeesController::class,'getEmployees']);

Route::get('/expenses/{expense_id}', [ExpensesController::class,'show']);
Route::patch('/employees', [EmployeesController::class,'update']);

Route::resource('/sales', SalesController::class)->except('getSales');
Route::get('/getSales', [SalesController::class,'getSales']);
Route::post('/getSales', [SalesController::class,'getSalesByDate']);
