<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $categories = Category::all();
           
    
            //$newcategory = json($category);
            foreach ($categories as $category) {
                if($category->imageUrl == null){
                $category->imageUrl = " ";
    
            }

            $category->image_url = $category->imageUrl;

            unset($category->created_at,$category->updated_at,$category->category_id,$category->imageUrl);
            }
            return response()->json([
                'status' => true,
                'data' => $categories,
                'message' => 'Category list Loaded successfully'
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
