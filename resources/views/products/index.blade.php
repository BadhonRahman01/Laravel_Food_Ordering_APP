<?php
//$b = Http::get("https://www.phprestaurant.trademajestic.com/api/banners/");
// $p = file_get_contents("https://www.phprestaurant.trademajestic.com/api/products/");
// $pr = json_decode($p, false);
// $prods = $pr->data;

    
?>

@extends('welcome2')
@section('title', 'Product Index')
@section('content')
    <div class="row py-5">
        <div class="col-lg-12 margin-tb py-3">
            <div class="pull-left">
                <h2>Product List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
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
            <th>Product ID</th>
            <th>Name</th>
            <th>Short Details</th>
            <th>Price</th>
            <th>Image URL</th>
            <th>Tag</th>
            <th>Status</th>
            <th>Category ID</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->product_id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->short_details }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->imageUrl }}</td>
            <td>{{ $product->tag }}</td>
            <td>{{ $product->status }}</td>
            <td>{{ $product->category_id }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $products->links() !!}
      
@endsection

