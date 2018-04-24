<?php

namespace App;

use App\Order;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $fillable = [
    	'product_id', //foreign
    	'quantity',
    	'price',
    	'order_id', //foreign
    ];

    public function order(){
    	return $this->belongsTo(Order::class);
    }

    public function product(){
    	return $this->hasMany(Product::class);
    }
}
