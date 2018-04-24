<?php

namespace App;

use App\Order_Detail;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'title',
    	'price',
    ];

    public function order_details()
    {
    	return $this->belongsToMany(Order_Detail::class);
    }
}
