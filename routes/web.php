<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\DashboardItemsController;
use App\Http\Controllers\DashboardBiddersController;

Route::get('/',[UsersController::class,'index'])->name('dashboard.index');
Route::get('/register',[UsersController::class,'register'])->name('register.user');
Route::post('create-user', [UsersController::class, 'createUser'])->name('create.user');
Route::get('/login',[UsersController::class,'viewLogin'])->name('login');
Route::post('/user-login',[UsersController::class,'userLogin'])->name('user.login');
Route::post('/logout', [UsersController::class, 'logout'])->name('logout');



//items route
Route::get('/item-index',[DashboardItemsController::class,'indexItem'])->name('index.item');
Route::get('/item-create',[DashboardItemsController::class,'createItem'])->name('create.item');
Route::post('/item-store',[DashboardItemsController::class,'storeItem'])->name('store.item');
Route::get('/item-edit/{id}',[DashboardItemsController::class,'editItem'])->name('edit.item');
Route::post('/item-update',[DashboardItemsController::class,'updateItem'])->name('update.item');
Route::delete('/item-destory/{id}',[DashboardItemsController::class,'destroyItem'])->name('destory.item');

//bidder route
Route::get('/bid-index',[DashboardBiddersController::class,'indexBid'])->name('index.bid');
Route::get('/bid-create',[DashboardBiddersController::class,'createBid'])->name('create.bid');
Route::post('/bid-store',[DashboardBiddersController::class,'storeBid'])->name('store.bid');




