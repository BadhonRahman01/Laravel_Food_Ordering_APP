<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Featprod;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FeatprodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $featprods = Featprod::all();
            foreach ($featprods as $featprod) {
            $category = Category::find($featprod->category_id);
            $product = Product::find($featprod->product_id);
            $featprod->category_name = $category->name;
            $featprod->product_name = $product->name;
            unset($featprod->created_at,$featprod->updated_at,$featprod->featprod_id,$featprod->product_id,$featprod->category_id );
            }
            return response()->json([
                'status' => true,
                'data' => $featprods,
                'message' => 'Featured Products list Loaded successfully'
            ]);
    
        } catch (Exception $e) {
                return response()->json([
                    'status'        => false,
                    'message'       => $e->getMessage()
                ]);
            }
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
     * @param  \App\Models\Featprod  $featprod
     * @return \Illuminate\Http\Response
     */
    public function show(Featprod $featprod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Featprod  $featprod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Featprod $featprod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Featprod  $featprod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Featprod $featprod)
    {
        //
    }
}
