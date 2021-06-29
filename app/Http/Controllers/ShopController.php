<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;
use App\Http\Requests\ShopEditRequest;
use App\Models\Swal;
use Illuminate\Support\Facades\Storage;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::paginate(4);
        return view('admin.pages.shops.index', [
          'shops' => $shops
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.shops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopRequest $request)
    {
        $shop = new Shop;
        $shop->location = $request->shop_title;
        
        $shop->directory_id = NULL; 

        $directory = FileStorageController::makeDirectory($shop->base_storage_path);
        
        if ($request->hasFile('selected_image')) {
          $headerImageSet = true;
        } else {
            $headerImageSet = false;
        }

        if($headerImageSet) {
          $file = FileStorageController::store($request->file('selected_image'), $directory->getFullPath());

          $shop->picture_file_name = $file; 
        } else {
          $shop->picture_file_name = NULL; 
        }

        $shop->directory_id = $directory->getDirectoryId();

        try {
          $shop->save();
        } catch (Exception $e) {
          //throw $e;
        }

        $swal = new Swal("Gotovo", 200, Route('admin.shop.index'), "success", "Gotovo!", "Prodavnica dodana.");
        return response()->json($swal->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view('admin.pages.shops.edit', [
          'shop' => $shop
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(ShopEditRequest $request, Shop $shop)
    {
        $shop->location = $request->shop_title; 
          
        if ($request->hasFile('selected_image')) {
          $headerImageSet = true;
        } else {
            $headerImageSet = false;
        }

        $oldImage = $shop->picture_file_name;
        $directory = FileStorageController::getDirectory($shop->base_storage_path, $shop->directory_id);

        if($headerImageSet) {
          $file = FileStorageController::store($request->file('selected_image'), $directory->getFullPath());
          $shop->picture_file_name = $file; 
          $shop->directory_id = $directory->getDirectoryId();
          Storage::delete($directory->getFullPath() . '/' . $oldImage);
        } else {
          $shop->picture_file_name = $shop->picture_file_name;
          $shop->directory_id = $shop->directory_id; 
        }

        try {
          $shop->save();
        } catch (Exception $e) {
          //throw $e;
        }

        $swal = new Swal("Gotovo", 200, Route('admin.shop.index'), "success", "Gotovo!", "Prodavnica uređena.");
        return response()->json($swal->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $directory = FileStorageController::getDirectory($shop->base_storage_path, $shop->directory_id);
        Storage::deleteDirectory($directory->getFullPath()); 

        try {
          $shop->delete();
        } catch (Exception $e) {}

        $swal = new Swal("Success", 200, Route('admin.shop.index'), "success", "Gotovo!", "Prodavnica izbrisana.");
        return response()->json($swal->get());
    }
}
