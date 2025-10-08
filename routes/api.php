<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\AuthController; 


Route::get('/test-api', function () {
    return response()->json(['message' => 'API is working!'], 200);
});


Route::post('login', [AuthController::class, 'login']); 
Route::post('logout', [AuthController::class, 'logout']);
Route::get('profile/{id}', [AuthController::class, 'profile']);
Route::post('update-profile/{id}', [AuthController::class, 'profile_Update']);

Route::middleware(['auth:sanctum'])->group(function (){
    // Route::post('logout', [AuthController::class, 'logout']);

    Route::post('update-profile', [ApiController::class, 'updateProfile']);

    // Brand routes
   

});

