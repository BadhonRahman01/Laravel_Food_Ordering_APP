<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $orders = Order::all();
            foreach ($orders as $order) {
            $product = Product::find($order->product_id);
            $order->product_name = $product->name;
            $store = Store::find($order->store_id);
            $order->store_name = $store->name;
            $order->quantity = $order->unit;
            unset($order->created_at,$order->updated_at,$order->order_id,$order->product_id,$order->store_id,$order->applied_coupons,$order->user_id,$order->unit );
            if($order->delivery_address == null){
                $order->delivery_address = " ";
                $order->delivery_status = " ";
                $order->tran_id = " ";
                unset($order->delivery_address,$order->delivery_status,$order->tran_id);
            }
            
            }
            return response()->json([
                'status' => true,
                'data' => $orders,
                'message' => 'Order list Loaded successfully'
            ]);
    
        } catch (Exception $e) {
                return response()->json([
                    'status'        => false,
                    'message'       => $e->getMessage()
                ]);
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
