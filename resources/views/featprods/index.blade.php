<?php
//$b = Http::get("https://www.phprestaurant.trademajestic.com/api/banners/");
// $f = file_get_contents("https://www.phprestaurant.trademajestic.com/api/featprods/");
// $fe = json_decode($f, false);
// $feats = $fe->data;

    
?>

@extends('welcome2')
@section('title', 'Featured Product Index')
@section('content')
    <div class="row py-5">
        <div class="col-lg-12 margin-tb py-3">
            <div class="pull-left">
                <h2>Featured Product List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('featprods.create') }}"> Create New Featured Product</a>
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
            <th>Featured Product ID</th>
            <th>Name</th>
            <th>Product ID</th>
            <th>Category ID</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($featprods as $featprod)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $featprod->featprod_id }}</td>
            <td>{{ $featprod->name }}</td>
            <td>{{ $featprod->product_id }}</td>
            <td>{{ $featprod->category_id }}</td>
            <td>
                <form action="{{ route('featprods.destroy',$featprod->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('featprods.show',$featprod->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('featprods.edit',$featprod->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $featprods->links() !!}
      
@endsection

