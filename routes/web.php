<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

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

 
Route::get('users', [UserController::class, 'index']);
Route::get('posts', [PostController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/users_and_posts', [HomeController::class,  'index']);

Route::view('/', 'home');