<?php

// $s = Http::get("https://www.phprestaurant.trademajestic.com/api/services/");
//banners
$json = file_get_contents("https://www.phprestaurant.trademajestic.com/api/banners/");
$json_data = json_decode($json, false);
$datas = $json_data->data;
// $bn = $datas[28];
//
$f = file_get_contents("https://www.phprestaurant.trademajestic.com/api/featprods/");
$fe = json_decode($f, false);
$feats = $fe->data;
?>


<style>
.banner {
  width:60%;
  height:250px;
    
  margin-left: auto;
  margin-right: auto;

  background-size: contain;
  background-repeat: no-repeat;
}
.ft {
  width:60%;
  height:250px;
  background-color: brown;
  margin-left: auto;
  margin-right: auto;
  background-size: contain;
  background-repeat: no-repeat;
}
img {
    width:100%;
    height:100%;
            }
h1{
    color: aliceblue;
    text-align: center;
}
h2{
    color: black;
    text-align: center;
}
hr.solid {
    border-top: 3px solid rgb(8, 6, 6);
    width: 60%;
    margin: auto;
}

.hr-sect {
    display: flex;
    width: 50%;
    flex-basis: 100%;
    align-items: center;
    color: rgba(0, 0, 0, 0.35);
    margin: 8px 0px;
    margin: auto;
}
.hr-sect:before,
.hr-sect:after {
    content: "";
    flex-grow: 1;
    background: rgba(0, 0, 0, 0.35);
    height: 1px;
    font-size: 0px;
    line-height: 0px;
    margin: 0px 8px;
}
</style>
@extends('master')
@section('title', 'Welcome')

@section('con')

<br>
<br>
<br>
<br>
<br>
<br>
@foreach ($datas as $data)
<?php
if($data->id == 28){
    $title = $data->title;
    $pic = $data->image_url;
    $url = "https://www.phprestaurant.trademajestic.com".$pic;

}
?>
@endforeach

    <div class="banner"   style="background-image: url({{$url}});">
        <br>
        <br>
     
        <h1> <strong> {{ $title}} </strong></h1>
        <br>
        <div class="col-md-12 text-center">
            <div class="container">
                <div class="row justify-content-md-center">
                  <div class="col col-lg-2">
                    <div class="d-grid gap-2">
                    <button type="button" class="btn btn-danger btn-lg pl-5 pr-5">Delivery</button>
                </div>
                  </div>
                  <div class="col col-lg-2">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-danger btn-lg pl-5 pr-5">Takeaway</button>
                    </div>
                  </div>
                  <div class="col col-lg-2">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-danger btn-lg pl-5 pr-5">Dine-in</button>
                    </div>
                  </div>
                </div>
            </div>
            </div>
    </div>
    <br>
    
    <div class="hr-sect"><h2><b>Featured Product </b></h2></div>
<br>
@foreach ($feats as $feat)
<div class="ft">
    <a href="{{ route('featprods.show',$feat->id) }}">
        <img src="https://kfcbd.com/storage/sliders/uwAswUaBGRhl3Zzh5fFcGqTq9.jpg" alt="{{$feat->category_name}}">
    </a>
</div>
    
<br>
@endforeach



{{-- https://kfcbd.com/storage/sliders/uwAswUaBGRhl3Zzh5fFcGqTq9.jpg --}}
    


@endsection