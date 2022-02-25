<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.
|
*/

// === Public routes

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// List all posts
Route::get('/posts', [PostController::class, 'index']);

// List a single post
Route::get('/posts/{id}', [PostController::class, 'show']);

// Search a post by title
Route::get('/posts/search/{title}', [PostController::class, 'search']);


// --- Protected routes

Route::group(['middleware' => ['auth:sanctum']], function ()
{ 
    // Create a new post
        Route::post('/posts', [PostController::class, 'store']);

    // Update a post 
        Route::put('/posts/{id}', [PostController::class, 'update']);   
        //Route::put('/posts', [PostController::class, 'update']);   // store update
        // Route::put('post', 'PostController@store');

    // Delete a post    
        Route::delete('/posts/{id}', [PostController::class, 'destroy']);
        
    // Logout
        Route::post('/logout', [AuthController::class, 'logout']);
});

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
