<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Service;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $url = "http://localhost:8000/api/banners";
        // $json = file_get_contents($url);
        // // file_put_contents("s.json", $json);
        // // $abc = fread("s.json");
        // $json_data = json_decode($json);
        // $ban = request('GET','http://localhost:8000/api/banners/');
        // $parsed_json = json_decode($ban, true);
        // $id = $parsed_json->{'data'}->{'id'};
        //$json_data = $json_dataa->data;
        // $response = Http::get("http://localhost:8000/api/banners/");

        //     if($response->data()){
        //         return $response;
        //     }
            
            
            //$response = $res->data;
            
        return view('home');
    }

    // public function banner()
    // {

    //     return Http::get('http://localhost:8000/api/banners');
    // }
}
