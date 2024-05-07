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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/greetinghello', function () {
    return 'Hello World';
});

Route::get('/user/', [UserController::class, 'show']);
Route::get('/getAllOrder/{id}', [PostController::class, 'index']);
Route::get('/postOrderComment', [PostController::class, 'postOrderComment']);
Route::get('/getOrderComment/{id}', [PostController::class, 'getOrderComment']);
Route::get('/getProduct/{sku}', [PostController::class, 'getProduct']);
Route::get('/postProduct', [PostController::class, 'postProduct']);
Route::get('/getCustomer/{id}', [PostController::class, 'getCustomer']);
Route::get('get-customer-target-form-bison/{id}', [PostController::class, 'getCustomer']);
Route::post('store-form', [PostController::class, 'storeCustomers']);
Route::get('inspirexx', [PostController::class, 'show']);
