<?php

use App\User;
use App\Order;
use App\Product;
use App\Order_Detail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');

    	User::truncate();
    	Product::truncate();
    	Order::truncate();
    	Order_Detail::truncate();

    	$usersQuantity = 1;
    	//$productsQuantity = 5;
    	//$ordersQuantity = 1;
    	//$order_detailsQuantity = 3;

    	factory(User::class, $usersQuantity)->create();
    	//factory(Product::class, $productsQuantity)->create();
    	//factory(Order::class, $ordersQuantity)->create();
    	//factory(Order_Detail::class, $order_detailsQuantity)->create();

        DB::table('products')->insert([
            ['title' => 'Fallout', 'price' => 1.99],
            ['title' => "Don't Starve", 'price' => 2.99],
            ['title' => "Baldur's Gate", 'price' => 3.99],
            ['title' => 'Icewind Dale', 'price' => 4.99],
            ['title' => 'Bloodborne', 'price' => 5.99],
            ]);
    	
        //DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
