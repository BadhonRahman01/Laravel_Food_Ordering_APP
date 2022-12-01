
@extends('welcome2')
@section('title', 'Create Product')
@section('content')
<div class="row py-5">
    <div class="col-lg-12 margin-tb py-5">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
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
   
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product ID:</strong>
                <input type="integer" name="product_id" class="form-control" placeholder="ID">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Short Details:</strong>
                <textarea class="form-control" style="height:150px" name="short_details" placeholder="Short Details"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="double" name="price" class="form-control" placeholder="Price">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image URL:</strong>
                <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="imageUrl" accept="image/*"></span>
                {{-- <textarea class="form-control" style="height:150px" name="imageUrl" placeholder="URL"></textarea> --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tag:</strong>
                <select name="tag" id="tag" class="form-control">
                    <option value="New-Item">New-Item</option>
                    <option value="Popular">Popular</option>
                    <option value="New-Arrival">New-Arrival</option>
                    <option value="Trending">Trending</option>
                    <option value="Hot-Item">Hot-Item</option>
                    <option value="Discount-Deal">Discount-Deal</option>
              </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <select name="status" id="status" class="form-control">
                    <option value="Active">Active</option>
                    <option value="Out-Of-Stock">Out-Of-Stock</option>
                    <option value="Not-Active">Not-Active</option>
              </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category ID:</strong>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    @foreach ($categories as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                  </select>
                  @error('category_id')
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