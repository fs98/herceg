<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductEditRequest;
use App\Models\Swal;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    
  public function orderFirstStep(Request $request) {
    $request->session()->put('shippingType', $request->shippingType);
    $request->session()->put('startDate', $request->start_date);
    $request->session()->put('endDate', $request->end_date);

    $totalItems = Cart::count();
    $categoryAll = Category::all();   
    if ($totalItems) { 
      return redirect()->route('narudzbaFrontRenderTwo')->with(['totalItems' => $totalItems]);
    } else {
      return view('front.pages.rezervacija')->with([ 'categories' => $categories ]);
    } 
  }

  public function orderSecondStep(OrderRequest $request) { 
    $shipping_type = $request->session()->get('shippingType');
    $start_date = $request->session()->get('startDate');
    $end_date = $request->session()->get('endDate');

    $order = new Order;
    $order->name = $request->form_name;
    $order->email = $request->email;
    $order->address = $request->address;
    $order->phone = $request->phone;
    $order->city = $request->city;
    $order->zip = $request->zip;
    $order->shipping_type = $shipping_type;
    $order->first_date = $start_date;
    $order->second_date = $end_date;
    $order->message = $request->message;
    

    $cartAll = Cart::content();
    /*
    * PDF receipt generator
    */

    $totalOrderPrice = Cart::total();
    $receiptFile = PdfController::generateReceipt($totalOrderPrice, $cartAll, $order); 
    
    $currentDateTime = new DateTime;
    $currentDateTime = $currentDateTime->format('d-m-Y-H-i-s-u');
    $filename = preg_replace('/[^A-Za-z0-9\-]/', '', $order->name) . "-" . $currentDateTime . "_racun.pdf";
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
    $totalItems = Cart::count();

    $receiptName = $order->name . '_trgovina_tom_racun_za_narudzbu_' . $order->created_at . '.pdf';

    if ($request->filled('email')) {
      Mail::send(new OrderShipped($request->email, $receiptFile, $receiptName));
    }

    $swal = new Swal("Gotovo", 200, Route('hvalaFrontRender'), "success", "Gotovo!", "Narudžba poslana!");
    return response()->json($swal->get()); 

  }
}
