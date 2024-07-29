<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\ListingController;

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



// SIMPLE API CREATION

Route::get('/posts', function(){
    return response()->json([
        'posts'=>[
            'title'=>"Post One"
            ]
        ]);
    });
    
//  Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('products/search/{name}', [ProductController::class, 'search']);
Route::get('listings', [ListingController::class, 'index']);

//  Protected routes
Route::group(['middleware'=>['auth:sanctum']], function () {
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});

// Route::get('/products', [ProductController::class, 'index']);
// Route::post('/products', [ProductController::class, 'store']);
// Route::get('/products/{id}', [ProductController::class, 'show']);

// INSTEAD OF DOING ABOVE,  WE CAN DO THIS FOR BASIC CRUD APP and everything works
// Route::resource('products', ProductController::class);




