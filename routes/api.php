<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::post('/registr', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/products/{product_id}', [ProductController::class, 'show']);
    //Route::get('/authors', [AuthorController::class, 'list']);
    
    Route::get('/products', [ProductController::class, 'index']);
});

Route::group(['middleware' => 'auth:sanctum', 'ability:admin'], function () {
    Route::post('/products/create', [ProductController::class, 'create']);

    Route::put('/products/{product_id}', [ProductController::class, 'update']);

    Route::delete('/products/{product_id}', [ProductController::class, 'delete']);
});
