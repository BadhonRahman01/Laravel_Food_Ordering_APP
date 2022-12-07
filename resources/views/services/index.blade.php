<?php
//$b = Http::get("https://www.phprestaurant.trademajestic.com/api/banners/");
// $s = file_get_contents("https://www.phprestaurant.trademajestic.com/api/services/");
// $se = json_decode($s, false);
// $sers = $se->data;

    
?>

@extends('welcome2')
@section('title', 'Service Index')
@section('content')
    <div class="row py-5">
        <div class="col-lg-12 margin-tb py-3">
            <div class="pull-left">
                <h2>Service List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('services.create') }}"> Create New Service</a>
                
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
            <th>Service ID</th>
            <th>Name</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($services as $service)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $service->service_id }}</td>
            <td>{{ $service->name }}</td>
            <td>{{ $service->status }}</td>
            <td>
                <form action="{{ route('services.destroy',$service->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('services.show',$service->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $services->links() !!}
      
@endsection

