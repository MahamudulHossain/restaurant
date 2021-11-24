<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomePage::class,'homeView']);
Route::get('/redirects',[HomePage::class,'redirects']);
Route::get('/users',[AdminController::class,'usersList']);
Route::get('/deleteUser/{id}',[AdminController::class,'userDelete']);
Route::get('/foodmenu',[AdminController::class,'foodmenu']);
Route::post('/foodmenudata',[AdminController::class,'foodmenudata']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
