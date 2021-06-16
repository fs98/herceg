<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use App\Models\Swal;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if(empty($user)) abort(404);
        if(!isset($user->id) || $user->id === NULL || $user->id === '') abort(404);
      
        $products = Product::orderBy('created_at', 'desc')->paginate(10);

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
        return view('admin.pages.products.create', [
            'product' => $product,
            'categories' => $categories
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
        $user = auth()->user();
        if(empty($user)) abort(404);
        if(!isset($user->id) || $user->id === NULL || $user->id === '') abort(404);

        $product = new Product;
        $product->title = $request->title;
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
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
