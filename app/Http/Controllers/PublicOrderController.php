<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Swal;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Requests\FirstStepRequest;
use App\Http\Requests\SecondStepRequest;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use DateTime;



class PublicOrderController extends Controller
{
     /**
     * Prikazi stranicu narudzbe
     *
     */
    public function order()
    {   
        $totalItems = Cart::count();
        $cartProducts = Cart::content();
        $totalPrice = Cart::subtotal();
        $products = Cart::content();


        // Ako ima proizvoda u kosarici onda prikazi ovu stranicu, a ako nema vrati na listu proizvoda.

        if ($totalItems) {

            return view('public.pages.order.step-one', [
                'products' => $products,
                'totalItems' => $totalItems,
                'cartProducts' => $cartProducts,
                'totalPrice' => $totalPrice
            ]);

        } else {
        
            return redirect()->route('public.products');

        }
        
    }

    /**
     * Sačuvaj podatke o datumu i nacinu isporuke i preusmjeri na drugi korak
     *
     */
    public function orderDetails(FirstStepRequest $request)
    {
      $request->session()->put('shippingType', $request->shippingType);
      $request->session()->put('fromDate', $request->fromDate);
      $request->session()->put('toDate', $request->toDate);

      return redirect()->route('public.order.second');
    }

    /**
     * Prikazi stranicu narudzbe za korak dva
     *
     */
    public function orderSecondStep()
    {
      // $shipping_type = $request->session()->get('shippingType');
      // $start_date = $request->session()->get('fromtDate');
      // $end_date = $request->session()->get('toDate');
      $totalItems = Cart::count();
      $cartProducts = Cart::content();
      $totalPrice = Cart::subtotal();
      $products = Cart::content();

      // Ako ima proizvoda u kosarici onda prikazi ovu stranicu, a ako nema vrati na listu proizvoda.

      if ($totalItems) {

        return view('public.pages.order.step-two', [
            'products' => $products,
            'totalItems' => $totalItems,
            'cartProducts' => $cartProducts,
            'totalPrice' => $totalPrice
        ]);

      } else {
      
          return redirect()->route('public.products');
          
      }
    }
    
    // Sacuvaj narudzbu

    public function orderFinal(SecondStepRequest $request)
    {
        $shipping_type = $request->session()->get('shippingType');
        $start_date = $request->session()->get('fromDate');
        $end_date = $request->session()->get('toDate');

        $order = new Order;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->zip = $request->zip;
        $order->shipping_type = $shipping_type;
        $order->from_date = $start_date;
        $order->until_date = $end_date;
        $order->message = $request->message;
        
        
        $cartAll = Cart::content();
        

        /*
        * PDF receipt generator
        */

        $totalOrderPrice = Cart::subtotal();

        $currentDateTime = new DateTime;
        $currentDateTime = $currentDateTime->format('d-m-Y-H-i-s-u');
        $filename = preg_replace('/[^A-Za-z0-9\-]/', '', $order->first_name) . "-" . preg_replace('/[^A-Za-z0-9\-]/', '', $order->last_name) . "-" . $currentDateTime . "_racun.pdf";

        $receiptFile = PdfController::generateReceipt($totalOrderPrice, $cartAll, $order, $filename); 

        $order->receipt = $filename;
        $order->save();

        foreach ($cartAll as $key => $cart) {
          $orderItem = new OrderItem;
          $orderItem->order_id = $order->id;
          $orderItem->product_id = $cart->id;
          $orderItem->quantity = $cart->qty;
          $orderItem->price = $cart->price;
          $orderItem->save();
        }

        $request->session()->flush();

        $receiptName = preg_replace('/[^A-Za-z0-9\-]/', '', $order->first_name) . "-" . preg_replace('/[^A-Za-z0-9\-]/', '', $order->last_name) . '_herceg_racun_za_narudzbu_' . $order->created_at . '.pdf';

        if ($request->filled('email')) {
          Mail::send(new OrderShipped($request->email, $receiptFile, $receiptName));
        }

        $swal = new Swal("Gotovo", 200, Route('public.index'), "success", "Gotovo!", "Narudžba poslana!");
        return response()->json($swal->get()); 

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

    /**
    * Ukloni proizvod iz kosarice
    *
    */ 

    public function increaseQuantity($id, $quantity) {
      Cart::update($id, $quantity + 1);
      return redirect()->back();
    }

    /**
    * Ukloni proizvod iz kosarice
    *
    */ 

    public function decreaseQuantity($id, $quantity) {
      if ($quantity <= 1) {
        Cart::remove($id);
      } else {
        Cart::update($id, $quantity - 1);
      }
      return redirect()->back();
    }
}
