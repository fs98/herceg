<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Swal;
use App\Models\Product;


class PublicOrderController extends Controller
{
     /**
     * Prikazi stranicu narudzbe
     *
     */
    public function order()
    {   
        $cartProducts = Cart::content();
        $totalPrice = Cart::subtotal();
        $products = Cart::content();
        $totalItems = Cart::count();

        // dd($products);

        return view('public.pages.order', [
            'products' => $products,
            'totalItems' => $totalItems,
            'cartProducts' => $cartProducts,
            'totalPrice' => $totalPrice
        ]);
    }

    /**
    * Stavi proizvod u kosaricu
    *
    */ 

    public function cartStore(Request $request, $id)
    {

        $product = Product::find($id);
        Cart::add($product->id, $product->title, 1, $product->price, [
          'image' => $product->header_image_url,
          'category' => $product->category->title
          ])->associate('App\Models\Product');
        $swal = new Swal("Gotovo", 200, '', "success", "Gotovo!", "Proizvod dodan u košaricu.");
        return response()->json($swal->get());
    }

    /**
    * Ukloni proizvod iz kosarice
    *
    */ 

    public function removeFromCart($id) {
        Cart::remove($id);
        return redirect()->back();
    }
}
