
@extends('welcome2')
@section('title', 'Edit Order')
@section('content')
    <div class="row py-5">
        <div class="col-lg-12 margin-tb py-3">
            <div class="pull-left">
                <h2>Edit Order</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
        There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('orders.update',$order->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Order ID:</strong>
                    <input type="integer" name="order_id" value="{{ $order->order_id }}" class="form-control" placeholder="ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Serving Method:</strong>
                    <input type="name" name="serving_method" value="{{ $order->serving_method }}" class="form-control" placeholder="Serving Method">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Applied Coupon:</strong>
                    <input type="integer" name="applied_coupons" value="{{ $order->applied_coupons }}" class="form-control" placeholder="Applied Coupon">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total price:</strong>
                    <input type="double" name="total_price" value="{{ $order->total_price }}" class="form-control" placeholder="Totatl price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantity:</strong>
                    <input type="integer" name="unit" value="{{ $order->unit }}" class="form-control" placeholder="Quantity">
                </div>
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Payment Method:</strong>
                    <input type="text" name="payment_method" value="{{ $order->payment_method }}" class="form-control" placeholder="Payment Method">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Delivery Address:</strong>
                    <input type="text" name="delivery_address" value="{{ $order->delivery_address }}" class="form-control" placeholder="Delivery Address">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Delivery Status:</strong>
                    <input type="text" name="delivery_status" value="{{ $order->delivery_status }}" class="form-control" placeholder="Delivery Status">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Transaction ID:</strong>
                    <input type="integer" name="tran_id" value="{{ $order->tran_id }}" class="form-control" placeholder="Transaction ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User ID:</strong>
                    <input type="integer" name="user_id" value="{{ $order->user_id }}" class="form-control" placeholder="ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product ID:</strong>
                    <input type="integer" name="product_id" value="{{ $order->product_id }}" class="form-control" placeholder="ID">
                    <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                        @foreach ($products as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                      </select>
                      @error('product_id')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                      @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Store ID:</strong>
                    <input type="integer" name="store_id" value="{{ $order->store_id }}" class="form-control" placeholder="ID">
                    <select name="store_id" id="store_id" class="form-control @error('store_id') is-invalid @enderror">
                        @foreach ($stores as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                      </select>
                      @error('store_id')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                      @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection