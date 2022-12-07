<?php
//$b = Http::get("https://www.phprestaurant.trademajestic.com/api/banners/");
// $o = file_get_contents("https://www.phprestaurant.trademajestic.com/api/orders/");
// $or = json_decode($o, false);
// $ords = $or->data;

    
?>

@extends('welcome2')
@section('title', 'Order Index')
@section('content')
    <div class="row py-5">
        <div class="col-lg-12 margin-tb py-3">
            <div class="pull-left">
                <h2>Order List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('orders.create') }}"> Create New Order</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Serial No</th>
            <th>Order ID</th>
            <th>Serving Method</th>
            <th>Applied Coupon</th>
            <th>Total Price</th>
            <th>Quantity</th>
            <th>Payment Method</th>
            <th>Delivery Address</th>
            <th>Delivery Status</th>
            <th>Transaction ID </th>
            <th>User ID</th>
            <th>Product ID</th>
            <th>Store ID</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $order->order_id }}</td>
            <td>{{ $order->serving_method }}</td>
            <td>{{ $order->applied_coupons }}</td>
            <td>{{ $order->total_price }}</td>
            <td>{{ $order->unit }}</td>
            <td>{{ $order->payment_method }}</td>
            <td>{{ $order->delivery_address }}</td>
            <td>{{ $order->delivery_status }}</td>
            <td>{{ $order->tran_id }}</td>
            <td>{{ $order->user_id }}</td>
            <td>{{ $order->product_id }}</td>
            <td>{{ $order->store_id }}</td>
            <td>
                <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('orders.show',$order->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $orders->links() !!}
      
@endsection

