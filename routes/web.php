<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/add',[App\Http\Controllers\platsController::class, 'storePlat'])->name('storePlat');
Route::get('/MyPosts',[App\Http\Controllers\platsController::class, 'myPosts'])->name('myPosts');
Route::post('/deletePost',[App\Http\Controllers\platsController::class, 'deletePost'])->name('deletePost');
Route::post('/editPost',[App\Http\Controllers\platsController::class, 'editPost'])->name('editPost');
Route::get('/addtocart',[App\Http\Controllers\CartController::class, 'store'])->name('storeCart');
Route::post('/RemoveFromCart',[App\Http\Controllers\CartController::class, 'RemoveFromCart'])->name('RemoveFromCart');
Route::get('/ChefsPosts/{id}',[App\Http\Controllers\platsController::class, 'getPlatsChef'])->name('allPostsChef');
// Route::get('/commander',[App\Http\Controllers\platsController::class, 'commander'])->name('commander');