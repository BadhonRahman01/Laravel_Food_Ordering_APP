<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $products = Product::all();
           
            foreach ($products as $product) {
                if($product->imageUrl == null){
                $product->imageUrl = " ";
            }
            $product->image_url = $product->imageUrl;
            $category = Category::find($product->category_id);
            $product->category_name = $category->name;
            unset($product->created_at,$product->updated_at,$product->product_id,$product->imageUrl,$product->category_id);
            }
            return response()->json([
                'status' => true,
                'data' => $products,
                'message' => 'Product list Loaded successfully'
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function Chicken(){
        try{
            $products = Product::all()->where('category_id', 1);
           
            foreach ($products as $product) {
                if($product->imageUrl == null){
                $product->imageUrl = " ";
            }
            $product->image_url = $product->imageUrl;
            $product->category_name = "Chicken";
            unset($product->created_at,$product->updated_at,$product->product_id,$product->imageUrl,$product->category_id);
            }
            return response()->json([
                'status' => true,
                'data' => $products,
                'message' => 'Chicken Products list Loaded successfully'
            ]);
    
        } catch (Exception $e) {
                return response()->json([
                    'status'        => false,
                    'message'       => $e->getMessage()
                ]);
            }
    }
    public function Burger(){
        try{
            $products = Product::all()->where('category_id', 2);
           
            foreach ($products as $product) {
                if($product->imageUrl == null){
                $product->imageUrl = " ";
            }
            $product->image_url = $product->imageUrl;
            $product->category_name = "Burger";
            unset($product->created_at,$product->updated_at,$product->product_id,$product->imageUrl,$product->category_id);
            }
            return response()->json([
                'status' => true,
                'data' => $products,
                'message' => 'Burger Products list Loaded successfully'
            ]);
    
        } catch (Exception $e) {
                return response()->json([
                    'status'        => false,
                    'message'       => $e->getMessage()
                ]);
            }
    }
    public function Sandwich(){
        try{
            $products = Product::all()->where('category_id', 3);
           
            foreach ($products as $product) {
                if($product->imageUrl == null){
                $product->imageUrl = " ";
            }
            $product->image_url = $product->imageUrl;
            $product->category_name = "Sandwich";
            unset($product->created_at,$product->updated_at,$product->product_id,$product->imageUrl,$product->category_id);
            }
            return response()->json([
                'status' => true,
                'data' => $products,
                'message' => 'Sandwich Products list Loaded successfully'
            ]);
    
        } catch (Exception $e) {
                return response()->json([
                    'status'        => false,
                    'message'       => $e->getMessage()
                ]);
            }
    }
    public function Snacks(){
        try{
            $products = Product::all()->where('category_id', 4);
           
            foreach ($products as $product) {
                if($product->imageUrl == null){
                $product->imageUrl = " ";
            }
            $product->image_url = $product->imageUrl;
            $product->category_name = "Snacks";
            unset($product->created_at,$product->updated_at,$product->product_id,$product->imageUrl,$product->category_id);
            }
            return response()->json([
                'status' => true,
                'data' => $products,
                'message' => 'Snacks Products list Loaded successfully'
            ]);
    
        } catch (Exception $e) {
                return response()->json([
                    'status'        => false,
                    'message'       => $e->getMessage()
                ]);
            }
    }
    public function Rice_Bowl(){
        try{
            $products = Product::all()->where('category_id', 5);
           
            foreach ($products as $product) {
                if($product->imageUrl == null){
                $product->imageUrl = " ";
            }
            $product->image_url = $product->imageUrl;
            $product->category_name = "Rice Bowl";
            unset($product->created_at,$product->updated_at,$product->product_id,$product->imageUrl,$product->category_id);
            }
            return response()->json([
                'status' => true,
                'data' => $products,
                'message' => 'Rice Bowl Products list Loaded successfully'
            ]);
    
        } catch (Exception $e) {
                return response()->json([
                    'status'        => false,
                    'message'       => $e->getMessage()
                ]);
            }
    }
    public function Dips(){
        try{
            $products = Product::all()->where('category_id', 9);
           
            foreach ($products as $product) {
                if($product->imageUrl == null){
                $product->imageUrl = " ";
            }
            $product->image_url = $product->imageUrl;
            $product->category_name = "Dips";
            unset($product->created_at,$product->updated_at,$product->product_id,$product->imageUrl,$product->category_id);
            }
            return response()->json([
                'status' => true,
                'data' => $products,
                'message' => 'Dips Products list Loaded successfully'
            ]);
    
        } catch (Exception $e) {
                return response()->json([
                    'status'        => false,
                    'message'       => $e->getMessage()
                ]);
            }
    }
}
