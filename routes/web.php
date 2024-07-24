<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// // Route::get('/hello', function(){
// //     return 'Hello world';
// // }); // every semi colon matters

// Route::get('/hello', function(){
//     return response('<h1>Hello world</h1>', 400) // this takes status code and 200 as default but we can change
//     ->header('Content-Type', 'text/plain') // as above default is text/html.. we can change it to anything
//     ->header('foo', 'bar'); // custom header 
//     // we can see the above changes in the network tab
// }); 

// Route::get('/posts/{id}', function($id){
//     // dd($id); This gives the value in the browser (die and dump)
//     // ddd($id); // This gives a lot of code in the browser  (die and dump and debug)
//     return response('<h2>Post id : </h2>' .$id);
// })->where('id', '[0-9+]'); // with this the string will throw error

// Route::get('/search', function(Request $request){
//     // dd($request->name . ' ' . $request->city); to get the value.. ps the value is in the query array
//     return $request->name . ' ' . $request->city; 
// });

// GET all listings
Route::get('/', [ListingController::class, 'index']); // importing controller is imp

// GET single listing
// Route::get('/listings/{id}', function ($id) {
//     return view('listing', [
//         'listing'=>Listing::find($id)
//     ]);
// });

// power of eloquent model
// now with this we dont need to handle if else to show 404 using abort() function and pass id

Route::get('/listings/create', [ListingController::class, 'create']);

Route::post('/listings', [ListingController::class, 'store']);

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

Route::get('/listings/{listing}', [ListingController::class, 'show']); // it should be down of above create because the above one will get this route and take as error

// show resister/create page
Route::get('/register', [UserController::class, 'create']);

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Logout user
Route::post('/logout', [UserController::class, 'logout']);