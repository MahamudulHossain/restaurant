<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\AdminController;



Route::get('/',[HomePage::class,'homeView']);
Route::get('/redirects',[HomePage::class,'redirects']);
Route::get('/users',[AdminController::class,'usersList']);
Route::get('/deleteUser/{id}',[AdminController::class,'userDelete']);
Route::get('/foodmenu',[AdminController::class,'foodmenu']);
Route::get('/foodmenulist',[AdminController::class,'foodmenulist']);
Route::get('/updateFood/{id}',[AdminController::class,'updateFood']);
Route::get('/deleteFood/{id}',[AdminController::class,'foodDelete']);
Route::post('/foodmenudata',[AdminController::class,'foodmenudata']);
Route::post('/updatefoodmenudata/{id}',[AdminController::class,'updatefoodmenudata']);
Route::post('/reservationForm',[AdminController::class,'reservationForm']);
Route::get('/reservationData',[AdminController::class,'reservationData']);
Route::get('/chefslist',[AdminController::class,'chefslist']);
Route::get('/addchefs',[AdminController::class,'addchefsForm']);
Route::post('/addChefsData',[AdminController::class,'addChefsData']);
Route::get('/deleteChef/{id}',[AdminController::class,'chefDelete']);
Route::get('/updateChef/{id}',[AdminController::class,'updateChef']);
Route::post('/updateChefsdata/{id}',[AdminController::class,'updateChefsdata']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
