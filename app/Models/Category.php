<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'directory_id',
      'picture_file_name',
    ];

    public function getBaseStoragePathAttribute() {
      return config('api.storage_paths.category');
    }

    public function getHeaderImageUrlAttribute() {
      return asset(config('api.storage_paths_v2.category') . $this->directory_id . '/' . $this->picture_file_name);
    }
}
