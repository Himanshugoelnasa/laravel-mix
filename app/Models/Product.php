<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table="products";

    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'make'
    ];


    public function category_details()
    {
          return $this->belongsTo('App\Models\Category', 'category', 'id');
    }


}
