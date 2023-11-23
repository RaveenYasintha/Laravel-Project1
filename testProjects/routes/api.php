<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AddressesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('customer', [CustomerController::class,'getAll']);


Route::post('customer', [CustomerController::class,'save']);


Route::put('customer/edit/{id}', [CustomerController::class,'edit']);


Route::delete('customer/edit/{id}', [CustomerController::class,'delete']);


Route::get('addresses', [AddressesController::class,'index']);

Route::get('customer/address/{id}', [CustomerController::class,'getAddressByID']);




