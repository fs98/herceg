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

// Public pages frontEnd Routes
Route::get('/', [App\Http\Controllers\PublicPageController::class, 'index'])->name('public.index');
Route::get('/o-nama', [App\Http\Controllers\PublicPageController::class, 'about'])->name('public.about');

Auth::routes([
  'register' => false
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() { 
  Route::resource('category', App\Http\Controllers\CategoryController::class);
  Route::resource('question', App\Http\Controllers\QuestionController::class);
  Route::resource('product', App\Http\Controllers\ProductController::class);
  Route::resource('order', App\Http\Controllers\OrderController::class);
  Route::resource('order_item', App\Http\Controllers\OrderItemController::class);
});