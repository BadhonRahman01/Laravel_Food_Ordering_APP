
@extends('orders.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Order</h2>
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
   
<form action="{{ route('orders.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Order ID:</strong>
                <input type="integer" name="order_id" class="form-control" placeholder="ID">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Serving Method:</strong>
                <select name="serving_method" id="serving_method" class="form-control">
                    <option value="Dine-in">Dine-in</option>
                    <option value="Delivery">Delivery</option>
                    <option value="Takeaway">Takeaway</option>
              </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Applied Coupone:</strong>
                <input type="integer" name="applied_coupons" class="form-control" placeholder="Applied Coupon" value="0">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Price:</strong>
                <input type="double" name="total_price" class="form-control" placeholder="Price">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Unit:</strong>
                <input type="integer" name="unit" class="form-control" placeholder="Unit">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payment Method:</strong>
                <select name="payment_method" id="payment_method" class="form-control">
                        <option value="Cash">Cash</option>
                        <option value="Card">Card</option>
                        <option value="Bkash">Bkash</option>
                        <option value="Nagad">Nagad</option>
                  </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Delivery Address:</strong>
                <textarea class="form-control" style="height:150px" name="delivery_address" placeholder="Address"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Delivery Status:</strong>
                <input type="text" name="delivery_status" class="form-control" placeholder="Delivery Status">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Transaction ID:</strong>
                <input type="text" name="tran_id" class="form-control" placeholder="Transaction ID">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User ID:</strong>
                <input type="integer" name="user_id" class="form-control" placeholder="ID">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product ID:</strong>
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