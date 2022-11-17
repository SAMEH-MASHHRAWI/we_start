<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Routing\PendingResourceRegistration;

Route::prefix('admin')->name('admin.')->group(function(){
Route::get('/',[AdminController::class,'index'])->name('index');

Route::resource('posts',PostController::class);
// Route::resource('posts',PostController::class)->withTrashed();
});
