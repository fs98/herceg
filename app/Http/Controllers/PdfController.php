<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\Product;
use DateTime;


class PdfController extends Controller
{
    //
    public static function generateReceipt($totalOrderPrice, $cartAll, $order, $filename)
    {
       //Create a FPDF object
      $pdf = new FPDF();

      //Set font for the entire document
      $pdf->SetFont('helvetica', 'B', 10);
      $pdf->SetTextColor(0, 0, 0);


      //Set up a page
      $pdf->AddPage('P');
      $pdf->SetDisplayMode('real', 'default');


      //Input variables
      $formatedPrice = $totalOrderPrice . ' KM';


      //Static variables
      $phoneText = "+387 60 000 000";
      $companyText = "Herceg";
      $addressText = iconv('UTF-8', 'windows-1252', "Bosna i Hercegovina");
      $priceText = "Cijena: " . $formatedPrice;
      $header = array('Naziv', 'Kolicina', 'Cijena', 'Ukupna cijena');
      

      // Header
      $pdf->Image('https://herceg.cf/images/logo/logo-herceg.png', 22, 25, -200);
      $pdf->Text(165.5, 29.5, $phoneText);
      $pdf->Text(168.5, 34, $companyText);
      $pdf->Text(157, 38.5, $addressText);
      $pdf->Line(22, 42, 192, 42);


      // Info
      $pdf->SetFontSize(12);


      // INSERT DATA
      // Header
      $pdf->SetXY(23, 50);
        
      $pdf->Cell(77, 10, $header[0], 1);
      $pdf->Cell(27, 10, $header[1], 1);
      $pdf->Cell(32, 10, $header[2], 1);
      $pdf->Cell(32, 10, $header[3], 1);
      $pdf->Ln();


      foreach ($cartAll as $key => $cart) {
        $product = Product::select('title','price')->where('id', $cart->id)->firstOrFail(); 
        
        $productName = new self();
        $productName = $productName->_cleanString($product->title);

        $productPrice = $product->price . ' KM';
        $quantity = $cart->qty;
        $totalPrice = ($cart->price * $cart->qty) . ' KM';
        
        $pdf->SetX(23);
        $pdf->Cell(77, 6, $productName, 1);
        $pdf->Cell(27, 6, $quantity, 1);
        $pdf->Cell(32, 6, $productPrice, 1);
        $pdf->Cell(32, 6, $totalPrice, 1);
        $pdf->Ln();

      }


      // Footer
      $pdf->SetFont('helvetica', 'B', 12);
      $pdf->Line(22, 275, 192, 275);
      $pdf->Text(22, 283, $priceText);

      $location = public_path() . "/storage/receipts/"; 
      $pdf->Output($location . $filename, "F");

      return $location . $filename;
      }


      private function _cleanString($text) {
        $utf8 = array(
            '/[čćç]/u'     =>   'c',
            '/[ČĆÇ]/u'     =>   'C',
            '/š/u'     =>   's',
            '/Š/u'     =>   'S',
            '/đ/'     =>   'd',
            '/Đ/'     =>   'D',
            '/ž/'     =>   'z',
            '/Ž/'     =>   'Z'
        );
        return preg_replace(array_keys($utf8), array_values($utf8), $text);
      }
}
