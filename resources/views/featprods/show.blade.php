@extends('welcome2')
@section('title', 'View Featured Product')
@section('content')
    <div class="row py-5">
        <div class="col-lg-12 margin-tb py-3">
            <div class="pull-left">
                <h2> Show Featured Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('featprods.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Featured Prouduct ID:</strong>
                {{ $featprod->featprod_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $featprod->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image URL:</strong>
                {{ $featprod->image_url }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product ID:</strong>
                {{ $featprod->product_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category ID:</strong>
                {{ $featprod->category_id }}
            </div>
        </div>
    </div>
@endsection