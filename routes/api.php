<?php
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;
Route::middleware('throttle:api')->group(function () {
 Route::get('/users',[UserController::class,'index']);
 Route::post('/users',[UserController::class,'store']);
});