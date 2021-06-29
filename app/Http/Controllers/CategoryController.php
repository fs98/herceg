<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Helper;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryEditRequest;
use App\Models\Swal;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
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
      
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.pages.categories.index', [
          'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $category = new Category;
      return view('admin.pages.categories.create', [
          'category' => $category
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $user = auth()->user();
        if(empty($user)) abort(404);
        if(!isset($user->id) || $user->id === NULL || $user->id === '') abort(404);

        $category = new Category;
        $category->location = $request->category_title;
        
        $category->directory_id = NULL; 

        $directory = FileStorageController::makeDirectory($category->base_storage_path);
        
        if ($request->hasFile('selected_image')) {
          $headerImageSet = true;
        } else {
            $headerImageSet = false;
        }

        if($headerImageSet) {
          $file = FileStorageController::store($request->file('selected_image'), $directory->getFullPath());

          $category->picture_file_name = $file; 
        } else {
          $category->picture_file_name = NULL; 
        }

        $category->directory_id = $directory->getDirectoryId();

        try {
          $category->save();
        } catch (Exception $e) {
          //throw $e;
        }

        $swal = new Swal("Gotovo", 200, Route('admin.category.index'), "success", "Gotovo!", "Kategorija dodana.");
        return response()->json($swal->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.pages.categories.edit', [
          'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryEditRequest $request, Category $category)
    {
        $user = auth()->user();
        if(empty($user)) abort(404);
        if(!isset($user->id) || $user->id === NULL || $user->id === '') abort(404); 

        $category->title = $request->category_title; 
        
        if ($request->hasFile('selected_image')) {
          $headerImageSet = true;
        } else {
            $headerImageSet = false;
        }

        $oldImage = $category->picture_file_name;
        $directory = FileStorageController::getDirectory($category->base_storage_path, $category->directory_id);

        if($headerImageSet) {
          $file = FileStorageController::store($request->file('selected_image'), $directory->getFullPath());
          $category->picture_file_name = $file; 
          $category->directory_id = $directory->getDirectoryId();
          Storage::delete($directory->getFullPath() . '/' . $oldImage);
        } else {
          $category->picture_file_name = $category->picture_file_name;
          $category->directory_id = $category->directory_id; 
        }

        try {
          $category->save();
        } catch (Exception $e) {
          //throw $e;
        }

        $swal = new Swal("Gotovo", 200, Route('admin.category.index'), "success", "Gotovo!", "Kategorija uređena.");
        return response()->json($swal->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    { 

        $directory = FileStorageController::getDirectory($category->base_storage_path, $category->directory_id);
        Storage::deleteDirectory($directory->getFullPath()); 

        try {
          $category->delete();
        } catch (Exception $e) {}

        $swal = new Swal("Success", 200, Route('admin.category.index'), "success", "Gotovo!", "Kategorija izbrisana.");
        return response()->json($swal->get());
    }
}
