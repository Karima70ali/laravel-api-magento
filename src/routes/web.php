<?php

use Illuminate\Support\Facades\Route;
use Bison\Target\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('get-customer-target-form-bison/{id}', [PostController::class, 'getCustomer']);
Route::post('store-form', [PostController::class, 'storeCustomers']);
Route::get('get-laravel-data', [PostController::class, 'getLaravelData']);
