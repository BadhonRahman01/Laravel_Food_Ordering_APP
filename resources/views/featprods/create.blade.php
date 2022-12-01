
@extends('welcome2')
@section('title', 'Create Featured Product')
@section('content')
<div class="row py-5">
    <div class="col-lg-12 margin-tb py-3">
        <div class="pull-left">
            <h2>Add New Featured Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('featprods.index') }}"> Back</a>
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
   
<form action="{{ route('featprods.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Featured Product ID:</strong>
                <input type="integer" name="featprod_id" class="form-control" placeholder="ID">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="name" name="name" class="form-control" placeholder="Name">
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