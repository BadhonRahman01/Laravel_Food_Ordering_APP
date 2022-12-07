<?php

// $s = Http::get("https://www.phprestaurant.trademajestic.com/api/services/");
//banners
$json = file_get_contents("https://www.phprestaurant.trademajestic.com/api/dashboard/");
$json_data = json_decode($json, false);
$datas = $json_data->data;
$count =0;

?>

@extends('master')
@section('title', 'Home Page')
@extends('sidebar')
@section('content')
@auth
<div class="container py-5">
<br>
            <div class="card">
                <div class="card-header">{{ __('Welcome You are successfully logged in!') }}</div>
                <div class="container ">
                    <div class="row border border-success">
                      <div class="col-sm border border-success">
                        
                        Total Banners: {{ $datas->total_banners}}
                      </div>
                      <div class="col-sm border border-success">
                        Total Categories: {{ $datas->total_categories}}
                      </div>
                      <div class="col-sm border border-success">
                        Total Featured Products: {{ $datas->total_featprods}}
                      </div>
                    </div>

                    <div class="row border border-success">
                        <div class="col-sm border border-success">
                          Total Menus: {{ $datas->total_menus}}
                        </div>
                        <div class="col-sm border border-success">
                          Total Orders: {{ $datas->total_orders}}
                        </div>
                        <div class="col-sm border border-success">
                          Total Products: {{ $datas->total_products}}
                        </div>
                      </div>
                      
                      <div class="row border border-success">
                        <div class="col-sm border border-success">
                          Total Services: {{ $datas->total_services}}
                        </div>
                        <div class="col-sm border border-success">
                          Total Stores: {{ $datas->total_stores}}
                        </div>
                        <div class="col-sm border border-success">
                          Total Users: {{ $datas->total_users}}
                        </div>
                      </div>
                    </div>
                  
                  </div>
                

            </div>
        </div>
    </div>
    
    @endauth

@endsection

