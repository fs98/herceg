<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use \DateTime;

use App\Models\Directory;

class FileStorageController extends Controller
{
    public static function store($file, $path) {
    	if(!isset($file) || is_null($file) || $file == '') abort(400);
    	if(!isset($path) || is_null($path) || $path == '') abort(400);

    	$currentDateTimeFileFormat = (new DateTime())->format('Y-m-d-H-i-s');

        $filenameWithExtHeaderImage = $file->getClientOriginalName();
        $filenameHeaderImage = pathinfo($filenameWithExtHeaderImage, PATHINFO_FILENAME);
        $extensionHeaderImage = $file->getClientOriginalExtension();
        $headerImageFilename = Str::random(64 - (strlen($currentDateTimeFileFormat) + strlen($extensionHeaderImage) + 2)) . "-" . $currentDateTimeFileFormat .  "." . $extensionHeaderImage;

        Storage::put($path . "/" . $headerImageFilename, file_get_contents($file));

        return $headerImageFilename;
    }

    public static function storeBase64($file, $directory, $type) {
      $currentDateTimeFileFormat = (new DateTime())->format('Y-m-d-H-i-s');

      if($type == "data:image/jpeg" || $type == "image/jpeg") {
        $filename = Str::random(64 - (strlen($currentDateTimeFileFormat) + 3 + 2)) . "-" . $currentDateTimeFileFormat .  ".jpg";
      } else if($type == "data:image/png" || $type == "image/png") {
        $filename = Str::random(64 - (strlen($currentDateTimeFileFormat) + 3 + 2)) . "-" . $currentDateTimeFileFormat .  ".png";
      } else {
        return 0;
      }

      Storage::put(config('api.storage_paths.posts') . $directory . "/" . $filename, $file);
      
      return asset(config('api.storage_paths_v2.posts') . "/" . $directory . "/" . $filename);
    }

    public static function makeDirectory($base_path) {
    	$directory_id = Str::random(64);

    	Storage::makeDirectory($base_path . $directory_id);

        return new Directory($directory_id, $base_path, $base_path . $directory_id);
    }

    public static function getDirectory($base_path, $directory_id) {
        return new Directory($directory_id, $base_path, $base_path . $directory_id);
    }

    public static function makeDirectoryAndStore($file, $base_path) {
    	$directory = FileStorageController::makeDirectory($base_path);

    	$file_name = FileStorageController::store($file, $directory['full_path']);

    	$directory['file_name'] = $file_name;

    	return $directory;
    }
}
