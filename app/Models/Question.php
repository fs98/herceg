<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'surname',
      'email',
      'phone',
      'address',
      'message'
    ];

    // Accessor
    public function getCreatedAtAttribute($date) 
    {
        return date('d.m.Y.', strtotime($date));
    }

    public function getEmailAttribute($value) 
    {
        if ($value) {
            return $value;
        } else {
            return '/';
        }
    }
}
