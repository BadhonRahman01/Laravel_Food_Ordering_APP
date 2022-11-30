<?php

namespace App\Http\Controllers;

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
        $products = Product::latest()->paginate(5);
    
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->pluck('name', 'id');
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product= $request->product_id;
        if($request->hasFile('imageUrl')){
            $picture = $request->imageUrl;
            $file_name = "bn{$product}." . $picture->getClientOriginalExtension();
            $picture->move(public_path('upload'), $file_name);

        }
        $product_data = $request->validate([
            'product_id' => 'required',
            'name' => 'required',
            'short_details' => 'nullable',
            'price' => 'required',
            'imageUrl' => 'nullable',
            'tag' => 'nullable',
            'status' => 'required',
            'category_id' => 'required',
        ]);
        $product_data['imageUrl'] = "/public/upload/{$file_name}";
        Product::create($product_data);
     
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->pluck('name', 'id');
        return view('products.edit',compact('product', 'categories'));
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
        $request->validate([
            'product_id' => 'required',
            'name' => 'required',
            'short_details' => 'nullable',
            'price' => 'required',
            'imageUrl' => 'nullable',
            'tag' => 'nullable',
            'status' => 'required',
            'category_id' => 'required',
        ]);
    
        $product->update($request->all());
     
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
