<?php

use App\Http\Controllers\Api\V1\AuthController;
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

Route::prefix('/v1')->group(function () {
    Route::prefix('/health')->group(function () {
        Route::get('/', [\App\Http\Controllers\Api\V1\HealthController::class, 'index']);
    });
});


Route::prefix('/v1')->group(function (){
    Route::controller(AuthController::class)->group(function (){
       Route::post('/register','register');
       Route::post('/login','login');
    });
});
