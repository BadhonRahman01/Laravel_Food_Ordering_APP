<?php
//$b = Http::get("https://www.phprestaurant.trademajestic.com/api/banners/");
// $s = file_get_contents("https://www.phprestaurant.trademajestic.com/api/stores/");
// $st = json_decode($s, false);
// $sts = $st->data;

    
?>

@extends('welcome2')
@section('title', 'Store Index')
@section('content')
    <div class="row py-5">
        <div class="col-lg-12 margin-tb py-3">
            <div class="pull-left">
                <h2>Store List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('stores.create') }}"> Create New Store</a>
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
            <th>Store ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Phone</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($stores as $store)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $store->store_id }}</td>
            <td>{{ $store->name }}</td>
            <td>{{ $store->location }}</td>
            <td>{{ $store->latitude }}</td>
            <td>{{ $store->longitude }}</td>
            <td>{{ $store->phone }}</td>
            <td>{{ $store->status }}</td>
            <td>
                <form action="{{ route('stores.destroy',$store->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('stores.show',$store->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('stores.edit',$store->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $stores->links() !!}
      
@endsection

