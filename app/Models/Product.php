<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Support\Str;

class Product extends Model
{   
    use Searchable;
    use HasFactory;
    use Searchable;

    protected $fillable = [
      'title',
      'slug',
      'directory_id',
      'picture_file_name',
    ];

    public function getBaseStoragePathAttribute() {
      return config('api.storage_paths.product');
    }

    public function getHeaderImageUrlAttribute() {
      return asset(config('api.storage_paths_v2.product') . $this->directory_id . '/' . $this->picture_file_name);
    }

    public function getSlugAttribute($value)
    {
      if ($value) {
        return $value;
      } else {
        return '/';
      }
    }

    /**
     * Generating a Mutator
     * Mutators are used for formating data when it is saving to database.
     * This could also be made with setSlugAttribute Accessor but this way the slug will change
     * every time a title does. If it was generated by Accessor then it would have static value
     * until we manually change it or write a code that does that.
     * 
     * @return void
     */
    protected function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Relations
     */

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function tags()
    {
      return $this->belongsToMany(Tag::class);
    }

}
