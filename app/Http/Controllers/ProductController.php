<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductEditRequest;
use App\Models\Swal;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $products = Product::orderBy('created_at', 'desc')->paginate(12);

        return view('admin.pages.products.index', [
          'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        $categories = Category::select('id','title')->get();
        $tags = Tag::get();
        return view('admin.pages.products.create', [
            'product' => $product,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    { 

        $product = new Product;
        $product->title = $request->title;
        $product->ingredients = $request->product_ingredients;
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->description = $request->product_description;
        $product->in_stock = $request->product_in_stock;


        $product->directory_id = NULL; 

        $directory = FileStorageController::makeDirectory($product->base_storage_path);
        
        if ($request->hasFile('selected_image')) {
          $headerImageSet = true;
        } else {
            $headerImageSet = false;
        }

        if($headerImageSet) {
          $file = FileStorageController::store($request->file('selected_image'), $directory->getFullPath());

          $product->picture_file_name = $file; 
        } else {
          $product->picture_file_name = NULL; 
        }

        $product->directory_id = $directory->getDirectoryId();

        try {
          $product->save();
          $product->tags()->sync($request->tags);
        } catch (Exception $e) {
          //throw $th;
        }

        $swal = new Swal("Gotovo", 200, Route('admin.product.index'), "success", "Gotovo!", "Proizvod dodan.");
        return response()->json($swal->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Product $product)
    {

        $cartProducts = Cart::content();
        $totalItems = Cart::count();
        $totalPrice = Cart::subtotal();

        return view('public.pages.product', [
            'cartProducts' => $cartProducts,
            'totalItems' => $totalItems,
            'totalPrice' => $totalPrice,
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::select('id','title')->get();
        $tags = Tag::get();
        return view('admin.pages.products.edit', [
          'product' => $product,
          'categories' => $categories,
          'tags' => $tags
        ]);
    
      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, Product $product)
    {
        $product->title = $request->title;
        $product->ingredients = $request->product_ingredients;
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->description = $request->product_description;
        $product->in_stock = $request->product_in_stock;


        $oldImage = $product->picture_file_name;

        $directory = FileStorageController::getDirectory($product->base_storage_path, $product->directory_id);
        
        if ($request->hasFile('selected_image')) {
          $headerImageSet = true;
        } else {
            $headerImageSet = false;
        }

        if($headerImageSet) {
          $file = FileStorageController::store($request->file('selected_image'), $directory->getFullPath());
          $product->picture_file_name = $file; 
          $product->directory_id = $directory->getDirectoryId();
          Storage::delete($directory->getFullPath() . '/' . $oldImage);
        } else {
          $product->picture_file_name = $product->picture_file_name;
          $product->directory_id = $product->directory_id;
        }

        try {
          $product->update();
          $product->tags()->sync($request->tags);
        } catch (Exception $e) {
          //throw $th;
        }

        $swal = new Swal("Gotovo", 200, Route('admin.product.index'), "success", "Gotovo!", "Proizvod dodan.");
        return response()->json($swal->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

      $directory = FileStorageController::getDirectory($product->base_storage_path, $product->directory_id);
      Storage::deleteDirectory($directory->getFullPath()); 

      try {
        $product->delete();
      } catch (Exception $e) {}

      $swal = new Swal("Success", 200, Route('admin.product.index'), "success", "Gotovo!", "Proizvod izbrisan.");
      return response()->json($swal->get());
    }
}
