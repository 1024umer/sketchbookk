<?php

use App\Http\Controllers\Admin\{HomeController,AdminAuthController,CategoryController,UserController,BlogController,
                                ArtistController,ContactController,ArtworkController};
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


// Admin Routes
Route::get('/admin/login',[AdminAuthController::class,'login'])->name('admin.login');
Route::get('/authenticate',[AdminAuthController::class,'authenticate'])->name('');
Route::get("/admin/logout", [AdminAuthController::class,"logout"])->name("admin.logout");

Route::middleware(['auth'])->prefix('dashboard')->name('admin.')->group(function () {
    Route::get('/backend',[HomeController::class,'index'])->name('home');
    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::get('/category/add',[CategoryController::class,'add'])->name('category.add');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

    Route::get('/user',[UserController::class,'index'])->name('user');
    Route::get('/user/approve/{id}',[UserController::class,'approve'])->name('user.approve');
    Route::get('/user/deny/{id}',[UserController::class,'deny'])->name('user.deny');
    Route::get('/user/delete/{id}',[UserController::class,'delete'])->name('user.delete');
    Route::get('/user/add',[UserController::class,'add'])->name('user.add');

    Route::get('/blog',[BlogController::class,'index'])->name('blog');
    Route::get('/blog/add',[BlogController::class,'add'])->name('blog.add');
    Route::post('/blog/store',[BlogController::class,'store'])->name('blog.store');
    Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
    Route::post('/blog/update/{id}',[BlogController::class,'update'])->name('blog.update');
    Route::get('/blog/delete/{id}',[BlogController::class,'delete'])->name('blog.delete');

    Route::get('/contact',[ContactController::class,'index'])->name('contact');
    Route::post('/contact/reply',[ContactController::class,'send'])->name('contact.reply');

    Route::get('/artwork',[ArtworkController::class,'index'])->name('artwork');
    Route::get('/artwork/approve/{id}',[ArtworkController::class,'approve'])->name('artwork.approve');
    Route::get('/artwork/deny/{id}',[ArtworkController::class,'deny'])->name('artwork.deny');
    Route::get('/artwork/view/{id}',[ArtworkController::class,'view'])->name('artwork.view');

    Route::get('/orders/list',[OrderController::class,'getAll'])->name('order.all');
    Route::get('/orders/view/{order_id}',[OrderController::class,'adminView'])->name('order.view');
    // Route::get('/artist',[ArtistController::class,'index'])->name('artist.request');
    // Route::get('/artist/approve/{id}',[ArtistController::class,'approve'])->name('artist.approve');
    // Route::get('/artist/deny/{id}',[ArtistController::class,'deny'])->name('artist.deny');

});
