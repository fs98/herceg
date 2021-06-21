<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class SearchproductsController extends Controller
{
    public function search(Request $request) {

    $search = $request->input('search');

    $products = Product::where('title', 'like', '%' . $search . '%')->get();
    
    return view('public.pages.products')->with(['products' => $products]);

   }
}
