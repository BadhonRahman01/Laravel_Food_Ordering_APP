<?php

namespace App\Http\Controllers;

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
        $featprods = Featprod::latest()->paginate(5);
    
        return view('featprods.index',compact('featprods'))
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
        $products = Product::orderBy('name')->pluck('name', 'id');
        return view('featprods.create', compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'featprod_id' => 'required',
            'name' => 'required',
            'product_id' => 'required',
            'category_id' => 'required',
        ]);
    
        Featprod::create($request->all());
     
        return redirect()->route('featprods.index')
                        ->with('success','Featued Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Featprod  $featprod
     * @return \Illuminate\Http\Response
     */
    public function show(Featprod $featprod)
    {
        return view('featprods.show',compact('featprod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Featprod  $featprod
     * @return \Illuminate\Http\Response
     */
    public function edit(Featprod $featprod)
    {
        $categories = Category::orderBy('name')->pluck('name', 'id');
        $products = Product::orderBy('name')->pluck('name', 'id');
        return view('featprods.edit',compact('featprod', 'categories','products'));
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
        $request->validate([
            'featprod_id' => 'required',
            'name' => 'required',
            'product_id' => 'required',
            'category_id' => 'required',
        ]);
    
        $featprod->update($request->all());
     
        return redirect()->route('featprods.index')
                        ->with('success','Featured Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Featprod  $featprod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Featprod $featprod)
    {
        $featprod->delete();
    
        return redirect()->route('featprods.index')
                        ->with('success','Featured Product deleted successfully');
    }
}
