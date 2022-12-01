

@extends('master')
@section('title', 'Home Page')
@extends('sidebar')
@section('content')
@auth
<div class="container py-5">

            <div class="card">
                <div class="card-header">{{ __('Welcome You are successfully logged in!') }}</div>
                <div class="container ">
                    <div class="row border border-success">
                      <div class="col-sm border border-success">
                        Total Banners: 
                      </div>
                      <div class="col-sm border border-success">
                        Total Categories: 
                      </div>
                      <div class="col-sm border border-success">
                        Total Featured Products:
                      </div>
                    </div>

                    <div class="row border border-success">
                        <div class="col-sm border border-success">
                          Total Menus:
                        </div>
                        <div class="col-sm border border-success">
                          Total Orders:
                        </div>
                        <div class="col-sm border border-success">
                          Total Products
                        </div>
                      </div>
                      
                      <div class="row border border-success">
                        <div class="col-sm border border-success">
                          Total Services:
                        </div>
                        <div class="col-sm border border-success">
                          Total Stores:
                        </div>
                        <div class="col-sm border border-success">
                          Total Users:
                        </div>
                      </div>
                    </div>
                  
                  </div>
                

            </div>
        </div>
    </div>
    
    @endauth

@endsection

