<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Featprod;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use App\Models\Store;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $services = Service::count();
            $banners = Banner::count();
            $categories = Category::count();
            $featprods = Featprod::count();
            $menus = Menu::count();
            $orders = Order::count();
            $stores = Store::count();
            $users = User::count();
            $products = Product::count();


            return response()->json([
                'status' => true,
                'data' => ['total_services' => $services,
                            'total_banners' => $banners,
                            'total_categories' => $categories,
                            'total_featprods' => $featprods,
                            'total_menus' => $menus,
                            'total_orders' => $orders,
                            'total_stores' => $stores,
                            'total_users' => $users,
                            'total_products' => $products],
                'message' => 'Total Model Count Loaded successfully'
            ]);
    
        } catch (Exception $e) {
                return response()->json([
                    'status'        => false,
                    'message'       => $e->getMessage()
                ]);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
