<?php

use App\Http\Controllers\Api\AuthCustomerController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api', 'prefix' => 'customer'], function () {
    Route::post('login', [AuthCustomerController::class, 'login']);
    Route::post('register', [AuthCustomerController::class, 'register']);
    Route::post('logout', [AuthCustomerController::class, 'logout']);
    Route::post('refresh', [AuthCustomerController::class, 'refresh']);
    Route::get('me', [AuthCustomerController::class, 'me']);
});

// Middleware cho các route cần xác thực customer
Route::group(['middleware' => ['auth:customer']], function () {
    // Các route cần xác thực customer ở đây
});
