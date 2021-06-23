<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use Gloudemans\Shoppingcart\Facades\Cart;

class PublicPageController extends Controller
{
    
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   


        $products = Product::orderByDesc('updated_at')->limit(8)->get();
        $cartProducts = Cart::content();
        $totalItems = Cart::count();
        $totalPrice = Cart::subtotal();
        
         return view('public.pages.home', [
          'products' => $products, 
          'cartProducts' => $cartProducts,
          'totalItems' => $totalItems,
          'totalPrice' => $totalPrice
      ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        $cartProducts = Cart::content();
        $totalItems = Cart::count();
        $totalPrice = Cart::subtotal();

        return view('public.pages.about', [
            'cartProducts' => $cartProducts,
            'totalItems' => $totalItems,
            'totalPrice' => $totalPrice
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function products()
    { 

      $cartProducts = Cart::content();
      $totalItems = Cart::count();
      $totalPrice = Cart::subtotal();
      $productsAll = Product::orderBy('created_at', 'desc');
      $category_id = request()->input('category_id');

      if (in_array($category_id, ['2', '3,', '4'])) {
        $productsAll->where('category_id', $category_id);
      }

      $products = $productsAll->get();
    
      return view('public.pages.products', [
          'products' => $products, 
          'cartProducts' => $cartProducts,
          'totalItems' => $totalItems,
          'totalPrice' => $totalPrice
      ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        $cartProducts = Cart::content();
        $totalItems = Cart::count();
        $totalPrice = Cart::subtotal();
        
        return view('public.pages.contact', [
            'cartProducts' => $cartProducts,
            'totalItems' => $totalItems,
            'totalPrice' => $totalPrice
        ]);
    }
}
