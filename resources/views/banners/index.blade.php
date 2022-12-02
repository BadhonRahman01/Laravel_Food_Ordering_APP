<?php
//$b = Http::get("https://www.phprestaurant.trademajestic.com/api/banners/");
$b = file_get_contents("https://www.phprestaurant.trademajestic.com/api/banners/");
$ba = json_decode($b, false);
$bans = $ba->data;




//in blade template
// @foreach ($bans as $ban )
//                           <?php
//                         if($ban){
//                             $count = $count +1;
//                           }
//                         ?>
//                         @endforeach
//                         {{ $count }}
//                         <?php
//                         $count =0;
//                         ?>
?>

@extends('welcome2')
 
@section('title', 'Banner Index')

@section('content')
    <div class="row py-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Banner List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('banners.create') }}"> Create New Banner</a>
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
            <th>Banner ID</th>
            <th>Title</th>
            <th>Image URL</th>
            <th>Redirection URL</th>
            <th>Category ID</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($banners as $banner)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $banner->banner_id }}</td>
            <td>{{ $banner->title }}</td>
            <td>{{ $banner->imageUrl}}</td>
            {{-- <td><img src="{{ $banner->imageUrl ? asset('upload/' . $banner->imageUrl : $banner->imageUrl) }}" ></td> --}}
            <td>{{ $banner->redirectUrl }}</td>
            <td>{{ $banner->category_id }}</td>
            <td>
                <form action="{{ route('banners.destroy',$banner->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('banners.show',$banner->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('banners.edit',$banner->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $banners->links() !!}
      
@endsection

