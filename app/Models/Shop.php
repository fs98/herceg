<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
      'location',
      'directory_id',
      'picture_file_name',
    ];

    public function getBaseStoragePathAttribute() {
      return config('api.storage_paths.shops');
    }

    public function getHeaderImageUrlAttribute() {
      return asset(config('api.storage_paths_v2.shops') . $this->directory_id . '/' . $this->picture_file_name);
    }
}
