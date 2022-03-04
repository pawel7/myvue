<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
//use App\Http\Controllers\AuthController;

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
 //Route::get('/users_and_posts', [HomeController::class,  'index']);

//  Route::get('/', function () {
//      return view('home');
//  });

//Route::get('/register', [AuthController::class, 'register']);
//Route::get('/login', [AuthController::class, 'login']);

Route::resource('posts', 'App\Http\Controllers\PostController');

Auth::routes();

Route::view('/', 'home');

Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);
