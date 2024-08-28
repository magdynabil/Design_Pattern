<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/decorator', [\App\Http\Controllers\DecoratorController::class, 'sendNotification']);
Route::get('/ChainOfResponsibility', [\App\Http\Controllers\ChainOfResponsibilityController::class, 'handleOrder']);
Route::get('/Specification', [\App\Http\Controllers\SpecificationController::class, 'checkSpecifications']);
Route::get('/observer', [\App\Http\Controllers\ObserverController::class, 'createOrder']);
Route::get('/adapter', [\App\Http\Controllers\PaymentController::class, 'example']);
