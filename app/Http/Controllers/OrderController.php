<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
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
        $orders = Order::latest()->paginate(5);
    
        return view('orders.index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name')->pluck('name', 'id');
        $products = Product::orderBy('name')->pluck('name', 'id');
        $stores = Store::orderBy('name')->pluck('name', 'id');
        return view('orders.create', compact('users','products','stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'serving_method' => 'required',
            'applied_coupons' => 'nullable',
            'total_price' => 'required',
            'unit' => 'required',
            'payment_method' => 'required',
            'delivery_address' => 'nullable',
            'delivery_status' => 'nullable',
            'tran_id' => 'nullable',
            'user_id' => 'nullable',
            'product_id' => 'required',
            'store_id' => 'required',
        ]);
    
        Order::create($request->all());
     
        return redirect()->route('orders.index')
                        ->with('success','Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $users = User::orderBy('name')->pluck('name', 'id');
        $products = Product::orderBy('name')->pluck('name', 'id');
        $stores = Store::orderBy('name')->pluck('name', 'id');
        return view('orders.edit',compact('order', 'users','products','stores'));
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
        $request->validate([
            'order_id' => 'required',
            'serving_method' => 'required',
            'applied_coupons' => 'nullable',
            'total_price' => 'required',
            'unit' => 'required',
            'payment_method' => 'required',
            'delivery_address' => 'nullable',
            'delivery_status' => 'nullable',
            'tran_id' => 'nullable',
            'user_id' => 'nullable',
            'product_id' => 'required',
            'store_id' => 'required',
        ]);
    
        $order->update($request->all());
     
        return redirect()->route('orders.index')
                        ->with('success','Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
    
        return redirect()->route('orders.index')
                        ->with('success','Order deleted successfully');
    }
}
