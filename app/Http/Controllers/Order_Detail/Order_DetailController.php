<?php

namespace App\Http\Controllers\Order_Detail;

use App\Product;
use App\Order_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Order_DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'product_id' => 'required|numeric',
            'order_id' => 'required|numeric',
            'quantity' => 'required|min:1|max:10|numeric',
            //'price' => 'numeric',
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $orderlimit = Order_Detail::where('order_id', $data['order_id'])->get();

        $productlimit = Order_Detail::where('product_id', $data['product_id'])->
                                      where('order_id', $data['order_id'])->get();

        $product = Product::findOrFail($data['product_id']);

        if (sizeof($orderlimit) < 3 && sizeof($productlimit) < 1){
            //$data['price'] = $data['quantity'] * $data['price'];
            $data['price'] = $data['quantity'] * $product->price;

            $order_detail = Order_Detail::create($data);

            return response()->json(['data' => $order_detail], 201);

        } elseif (sizeof($orderlimit) < 3 && sizeof($productlimit) >= 1) {

            Order_Detail::where('product_id', $data['product_id'])->
                          where('order_id', $data['order_id'])->increment('quantity', $data['quantity']);

            return response()->json(['added_items' => $data['quantity']], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order_detail = Order_Detail::findOrFail($id);
        
        $order_detail->delete();

        return response()->json(['data' => $order_detail], 200);
    }
}
