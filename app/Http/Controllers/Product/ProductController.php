<?php

namespace App\Http\Controllers\Product;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->simplePaginate(3);
        return response()->json(['data' => $products], 200);
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
            'title' => 'required|unique:products',
            'price' => 'required|numeric',
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $product = Product::create($data);

        return response()->json(['data' => $product], 201);
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
        $product = Product::findOrFail($id);

        $rules = [
            'title' => 'unique:products',
            'price' => 'numeric',
        ];

        if ($request->has('title')){
            $product->title = $request->title;
        }        

        if ($request->has('price')){
            $product->price = $request->price;
        }       

        if (!$product->isDirty()){
            return response()->json(['error' => 'Specify a different value', 'code' => 422], 422);
        }

        $product->save();

        return response()->json(['data' => $product], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        $product->delete();

        return response()->json(['data' => $product], 200);
    }
}
