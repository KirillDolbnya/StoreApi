<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'name',
      'image',
      'description'
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
}
