<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class SearchproductsController extends Controller
{
    public function search(Request $request) {

    $cartProducts = Cart::content();
    $totalItems = Cart::count();
    $totalPrice = Cart::subtotal();
    $search = $request->input('search');

    $products = Product::where('title', 'like', '%' . $search . '%')->get();
    
    return view('public.pages.products')->with([
        'products' => $products,
        'cartProducts' => $cartProducts,
        'totalItems' => $totalItems,
        'totalPrice' => $totalPrice

    ]);

   }
}
