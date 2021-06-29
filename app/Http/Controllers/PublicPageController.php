<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Shop;
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
        $shops = Shop::select(['location', 'directory_id', 'picture_file_name' ])->get();

        return view('public.pages.about', [
            'cartProducts' => $cartProducts,
            'totalItems' => $totalItems,
            'totalPrice' => $totalPrice,
            'shops' => $shops
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
      $products = Product::orderBy('created_at', 'desc')->get();

    
      return view('public.pages.products', [
          'products' => $products, 
          'cartProducts' => $cartProducts,
          'totalItems' => $totalItems,
          'totalPrice' => $totalPrice
      ]);
    }

    public function categoryProducts(Category $category)
    {
      $products = $category->products()->orderBy('created_at', 'desc')->get();
      $cartProducts = Cart::content();
      $totalItems = Cart::count();
      $totalPrice = Cart::subtotal();

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
