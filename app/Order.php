<?php

namespace App;

use App\User;
use App\Order_Detail;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	//'total_price',
    	'user_id', //foreign
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function order_detail()
    {
   		return $this->hasMany(Order_Detail::class);
    }

}
