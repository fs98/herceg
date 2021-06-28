<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PublicOrderController;
use App\Http\Controllers\SearchproductsController;

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
Route::get('/', [PublicPageController::class, 'index'])->name('public.index');
Route::get('/o-nama', [PublicPageController::class, 'about'])->name('public.about');
Route::get('/proizvodi', [PublicPageController::class, 'products'])->name('public.products');

Route::get('/proizvodi/{category:slug}/{product:slug}', [ProductController::class, 'show'])->name('public.products.show');
Route::get('/proizvodi/{category:slug}', [PublicPageController::class, 'categoryProducts'])->name('public.category.products');

Route::get('/kontakt', [PublicPageController::class, 'contact'])->name('public.contact');
Route::post('/kontakt', [QuestionController::class, 'store'])->name('public.contact.store');

// Order
Route::get('/narudzba/prvi-korak', [PublicOrderController::class, 'order'])->name('public.order');
Route::post('/narudzba/prvi-korak', [PublicOrderController::class, 'orderDetails'])->name('public.order.details');
Route::get('/narudzba/drugi-korak', [PublicOrderController::class, 'orderSecondStep'])->name('public.order.second');
Route::post('/narudzba/drugi-korak', [PublicOrderController::class, 'orderFinal'])->name('public.order.final');

// Route for search
Route::get('/search', [SearchproductsController::class, 'search'])->name('public.search');

// Cart Routes
Route::post('/proizvodi/{id}', [PublicOrderController::class, 'cartStore'])->name('cart.store');
Route::delete('/proizvodi/{id}', [PublicOrderController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/proizvodi/increase/{id}/{quantity}', [PublicOrderController::class, 'increaseQuantity'])->name('cart.increase');
Route::post('/proizvodi/decrease/{id}/{quantity}', [PublicOrderController::class, 'decreaseQuantity'])->name('cart.decrease');


Auth::routes([
  'register' => false
]);

Route::get('/admin', function() {
  return redirect()->route('admin.order.index');
});


// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() { 
  Route::resource('category', App\Http\Controllers\CategoryController::class)->except([
    'show'
  ]);
  Route::resource('question', QuestionController::class)->only([
    'index', 'destroy'
  ]);
  Route::resource('product', App\Http\Controllers\ProductController::class)->except([
    'show'
  ]);
  Route::resource('order', App\Http\Controllers\OrderController::class)->only([
    'index', 'show'
  ]);
  Route::resource('tag', App\Http\Controllers\TagController::class)->except([
    'show'
  ]);
  Route::resource('user', App\Http\Controllers\UserController::class)->except([
    'show'
  ]);
});
