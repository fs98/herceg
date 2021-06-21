<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;

class PublicPageController extends Controller
{
    
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   


        $products = Product::orderByDesc('updated_at')->limit(10)->get();
        
         return view('public.pages.home', [
          'products' => $products, 
      ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('public.pages.about');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function products()
    { 
      $productsAll = Product::orderBy('created_at', 'desc');
      $category_id = request()->input('category_id');

      if (in_array($category_id, ['2', '3,', '4'])) {
        $productsAll->where('category_id', $category_id);
      }

      $products = $productsAll->get();
    
      return view('public.pages.products', [
          'products' => $products, 
      ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('public.pages.contact');
    }
}
