<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\API\TransactionController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('login', [UserController::class, 'updateProfile']);
    Route::post('user/photo', [UserController::class, 'updatePhoto']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::post('checkout', [TransactionController::class, 'checkout']);

    Route::get('transaction', [TransactionController::class, 'all']);
    Route::post('transaction/{id}', [TransactionController::class, 'update']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::get('food', [FoodController::class, 'all']);

Route::post('midtrans/callback', [MidtransController::class, 'callback']);

// https://www.postman.com/crimson-comet-3282/workspace/ce583485-7913-4a50-8a56-7c3091e3b7ca/collection/10889237-14269b09-b1c7-460e-9145-ccfa99f5147f
