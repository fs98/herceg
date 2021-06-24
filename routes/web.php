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
Route::get('/proizvodi', [App\Http\Controllers\PublicPageController::class, 'products'])->name('public.products');
Route::get('/proizvodi/{category:slug}/{product:slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('public.products.show');
Route::get('/proizvodi/{category:slug}', [App\Http\Controllers\PublicPageController::class, 'categoryProducts'])->name('public.category.products');
Route::get('/kontakt', [App\Http\Controllers\PublicPageController::class, 'contact'])->name('public.contact');
Route::post('/kontakt', [App\Http\Controllers\QuestionController::class, 'store'])->name('public.contact.store');

// Order
Route::get('/narudzba/prvi-korak', [App\Http\Controllers\PublicOrderController::class, 'order'])->name('public.order');
Route::post('/narudzba/prvi-korak', [App\Http\Controllers\PublicOrderController::class, 'orderDetails'])->name('public.order.details');
Route::get('/narudzba/drugi-korak', [App\Http\Controllers\PublicOrderController::class, 'orderSecondStep'])->name('public.order.second');
Route::post('/narudzba/drugi-korak', [App\Http\Controllers\PublicOrderController::class, 'orderFinal'])->name('public.order.final');

// Route for search
Route::get('/search', [App\Http\Controllers\SearchproductsController::class, 'search'])->name('public.search');

Route::post('/proizvodi/{id}', [App\Http\Controllers\PublicOrderController::class, 'cartStore'])->name('cart.store');
Route::delete('/proizvodi/{id}', [App\Http\Controllers\PublicOrderController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/proizvodi/increase/{id}/{quantity}', [App\Http\Controllers\PublicOrderController::class, 'increaseQuantity'])->name('cart.increase');
Route::post('/proizvodi/decrease/{id}/{quantity}', [App\Http\Controllers\PublicOrderController::class, 'decreaseQuantity'])->name('cart.decrease');


Auth::routes([
  'register' => false
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() { 
  Route::resource('category', App\Http\Controllers\CategoryController::class);
  Route::resource('question', App\Http\Controllers\QuestionController::class)->except([
    'store'
  ]);
  Route::resource('product', App\Http\Controllers\ProductController::class)->except([
    'show'
  ]);
  Route::resource('order', App\Http\Controllers\OrderController::class);
  Route::resource('order_item', App\Http\Controllers\OrderItemController::class);
  Route::resource('tag', App\Http\Controllers\TagController::class);
});
