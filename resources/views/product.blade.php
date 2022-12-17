
<?php

//categories
$json = file_get_contents("https://www.phprestaurant.trademajestic.com/api/categories/");
$json_data = json_decode($json, false);
$datas = $json_data->data;
//products

////////
if(isset($_GET["head"])){
$head = $_GET["head"];
$h = strtolower($head);
$p = file_get_contents("https://www.phprestaurant.trademajestic.com/api/product.".$h);
$pr = json_decode($p, false);
$prods = $pr->data;

}else {
$p = file_get_contents("https://www.phprestaurant.trademajestic.com/api/products/");
$pr = json_decode($p, false);
$prods = $pr->data;
}

?>

<style>
    nav#menu-container {
    background:#e62f4b;
    position:relative;
    width:60%;
    height: 50px;
    margin: auto;
}
#btn-nav-previous {
    text-align: center;
    color: white;
    cursor: pointer;
    font-size: 24px;
    position: absolute;
    left: 0px;
    padding: 9px 12px;
    background: #FFF;
    fill:rgb(179, 8, 8);
}
#btn-nav-next {
    text-align: center;
    color: white;
    cursor: pointer;
    font-size: 24px;
    position: absolute;
    right: 0px;
    padding: 9px 12px;
    background: #FFF;
    fill:rgb(179, 8, 8);
}
.menu-inner-box
{ 
    width: 100%;
    white-space: nowrap;
    margin: 0 auto;
    overflow: hidden;
    padding: 0px 54px;
    box-sizing: border-box;
}
/* .menu:hover{

    background-color: cornflowerblue;
} */
.menu
{  
    padding:0;
    margin: 0;
    list-style-type: none;
    display:block;
    text-align: center;
}
.menu-item
{
    height:100%;
    padding: 0px 25px;
    color:#fff;
    display:inline;
    margin:0 auto;
    line-height:57px;
    text-decoration:none;
    text-align:center;
    white-space:no-wrap;
}
.menu-item:hover {
    text-decoration: overline underline;
    color: rgb(224, 3, 62);
    background-color: rgb(178, 187, 208);
    background-size: cover;
}
.menu-item-selected{
    text-decoration: overline underline;
    color: rgb(224, 3, 62);
    background-color: #fff;
    background-size: cover;
    font-weight: bold;
    outline: none;
    border-color: #0b0000;
    box-shadow: 0 0 10px #070000;
}
.menu-item-selected:active{
    text-decoration: overline underline;
    color: rgb(224, 3, 62);
    background-color: #fff;
    background-size: cover;
    font-weight: bold;
    outline: none;
    border-color: #0b0000;
    box-shadow: 0 0 10px #070000;
}
.last-item{
  margin-right: 50px;
}

h1{
    color: rgb(0, 1, 2);
    padding-left: 22%;
}
    </style>
@extends('master')
@section('title', 'Product')

@section('con')
<br>
<br>
<br>
<br>
<br>

<nav id="menu-container" class="arrow">
    <div id="btn-nav-previous" >
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
              viewBox="0 0 24 24">
        <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" />
        <path d="M0 0h24v24H0z" fill="none" />
      </svg>
    </div>
    <div id="btn-nav-next">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
              viewBox="0 0 24 24">
        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" />
        <path d="M0 0h24v24H0z" fill="none" />
      </svg>
    </div>
    <div class="menu-inner-box ">
        <div class="menu " id="m1">

    @foreach ($datas as $data)
    {{-- <form  action="{{ route('products.header', $data->name) }}" method="POST"> --}}
    <button type="submit" class="button" onclick="refresh()">
        <input  type = "button">
       <a class="menu-item"  name="{{ $data->name}}" id="{{ $data->name}}"  href="">{{ $data->name}}</a>
    </button>
    @endforeach
{{-- </form> --}}

</div>
</div>
  </nav>
<br>
<br>


<div class="container px-6 mx-auto">
    <h3 class="text-2xl font-medium text-black" id="header" name="header" style="font-weight:bold;">
    <?php
    if(isset($_GET["head"])){
    $head = $_GET["head"];
    echo $head;
}
    ?>
    </h3>
    <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($prods as $product)
        

            <div class="flex items-end justify-end w-full bg-cover ">
                <div class="w-max-30 max-w-sm mx-auto overflow-hidden rounded-md shadow-md ">
                    <img src="{{ url("https://www.phprestaurant.trademajestic.com" . $product->image_url) }}" alt="" class="w-60 h-60 ">
                    <div class="px-5 py-3">
                        <h3 class="text-black w-40 h-12"><b>{{ $product->name }}</b></h3>
                        <span class="mt-2 text-black">৳<b>{{ $product->price }}</b></span>
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ $product->image_url }}"  name="image">
                            <input type="hidden" value="1" name="quantity">
                            
                            <button class="px-4 py-2 text-white bg-red-500 rounded">Add To Cart</button>
                        </form>
                    </div>
            </div>

            
        </div>
        @endforeach
    </div>
</div>

 <script type = "text/javascript">

 var btn = document.querySelectorAll('.menu-item');
 btn.forEach(item=>{

    item.addEventListener('click', (event) => {
        // console.log(item);
        chicken(item);
        event.preventDefault()
    })
 });

    function chicken(item){
//         const cats = ["Chicken", "Burger", "Sandwich", "Snacs", "Rice Bowl", "Delivery", "Dips"];
//         cats.forEach(item=>{
//             var cat = document.getElementById(item);
//             cat.classList.add("menu-item")
//             cat.addEventListener('click', (event) => {
//         event.preventDefault()
//     })
// });

        var element = document.getElementById(item.name);
        element.classList.add("menu-item-selected")
        //element.style.display = "block";
        //window.onload = function(){};
        var header = document.getElementById('header');
        //header.innerHTML = item.name;
        var head = item.name;
        window.location.href="product?head="+ item.name;
        //return item.name; 
}    
</script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
        $('#btn-nav-previous').click(function(){
            $(".menu-inner-box").animate({scrollLeft: "-=100px"});
        });
        
        $('#btn-nav-next').click(function(){
            $(".menu-inner-box").animate({scrollLeft: "+=100px"});
        });
    });
    </script>
    


  @endsection
