<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('/categories',[CategoryController::class,'index'])->name('categories');
Route::post('/categoryAdd',[CategoryController::class,'store'])->name('categoryAdd');
Route::post('/categoryEdit',[CategoryController::class,'edit'])->name('categoryEdit');
Route::post('/categoryUpdate',[CategoryController::class,'update'])->name('categoryUpdate');
Route::post('/categoryDelete',[CategoryController::class,'destroy'])->name('categoryDelete');

Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::get('/postCreate',[PostController::class,'create'])->name('postCreate');
Route::post('/postStore',[PostController::class,'store'])->name('postStore');
Route::post('/postEdit',[PostController::class,'edit'])->name('postEdit');
Route::post('/postUpdate',[PostController::class,'update'])->name('postUpdate');
Route::post('/postDelete',[PostController::class,'destroy'])->name('postDelete');

Route::get('/logout',[LogoutController::class,'logout'])->name('logout');

// API
Route::get('/api/posts-random',[ApiController::class,'postsRandom']);
Route::get('/api/posts',[ApiController::class,'posts']);
Route::get('/api/categories',[ApiController::class,'categories']);
Route::get('/api/category/{category}',[ApiController::class,'postByCategory']);
Route::get('/api/search/{title}',[ApiController::class,'postByTitle']);

ROute::post('/api/register',[ApiController::class,'register']);
Route::post('/api/login',[ApiController::class,'login']);

Route::get('api/history/{user}',[ApiController::class,'histories']);
Route::post('api/history/delete',[ApiController::class,'historyDestroy']);
Route::post('/api/history/store',[ApiController::class,'historyStore']);
