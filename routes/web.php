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
Route::get('/kontakt', [App\Http\Controllers\PublicPageController::class, 'contact'])->name('public.contact');
// Route for search
Route::get('/search', [App\Http\Controllers\SearchproductsController::class, 'search'])->name('public.search');

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
  Route::resource('tag', App\Http\Controllers\TagController::class);
});

Route::get('search', function() {
  $search = $request->input('search');
    $products = Product::where('title', 'like', '%' . $search . '%')->get();
    return view('public.pages.products')->with(['products' => $products]);
})->name('search');
