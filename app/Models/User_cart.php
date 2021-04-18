<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_cart extends Model
{
    use HasFactory;

    protected $table="user_carts";

    protected $fillable = [
        'user_id',
        'product_id',
        'price',
        'quantity',
        'in_stock'
    ];


    public function product_details()
    {
          return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function user_details()
    {
          return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
