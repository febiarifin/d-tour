<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/post/category/{slug}', [HomeController::class, 'postByCategory'])->name('post.category');
Route::post('/post/serach', [HomeController::class, 'search'])->name('post.search');

Route::group(['middleware' => 'guest'], function(){
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/login',[LoginController::class,'login'])->name('login');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/categories',[CategoryController::class,'index'])->name('categories');
    Route::post('/category/store',[CategoryController::class,'store'])->name('categories.store');
    Route::post('/category/edit',[CategoryController::class,'edit'])->name('categories.edit');
    Route::post('/category/update',[CategoryController::class,'update'])->name('categories.update');
    Route::post('/category/delete',[CategoryController::class,'destroy'])->name('categories.destroy');

    Route::get('/posts',[PostController::class,'index'])->name('posts');
    Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
    Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');
    Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('posts.edit');
    Route::put('/posts/update{id}',[PostController::class,'update'])->name('posts.update');
    Route::delete('/posts/delete/{id}',[PostController::class,'destroy'])->name('posts.destroy');

    Route::get('/logout',[LogoutController::class,'logout'])->name('logout');
});
