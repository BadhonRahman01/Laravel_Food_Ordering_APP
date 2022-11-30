<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Category;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(5);
    
        return view('banners.index',compact('banners'))
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
        return view('banners.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = $request->banner_id;
        if($request->hasFile('imageUrl')){
            $picture = $request->imageUrl;
            $file_name = "bn{$banner}." . $picture->getClientOriginalExtension();
            $picture->move(public_path('upload'), $file_name);
            //$request->imageUrl = "/public/upload/{{$file_name}}";
            //dd($request->imageUrl);
            //$request->imageUrl = $file_name;
        //$banner_data = $request->validate();
        //$banner_data['imageUrl'] = $file_name;
        //$request->imageUrl = $picture;
        //$request->imageUrl = $p;
        //$url ="C:/xampp/htdocs/Food-ordering-app/public/upload/{$file_name}";
        //$request->imageUrl = $url;
        }
        $banner_data = $request->validate([
            'banner_id' => 'required',
            'title' => 'required',
            'imageUrl' => 'nullable',
            'redirectUrl'=> 'nullable',
            'category_id' => 'required',
            
        ]);
        $banner_data['imageUrl'] = "/public/upload/{$file_name}";
    
        Banner::create($banner_data);
     
        return redirect()->route('banners.index')
                        ->with('success','Banner created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('banners.show',compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $categories = Category::orderBy('name')->pluck('name', 'id');
        return view('banners.edit',compact('banner', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'banner_id' => 'required',
            'title' => 'required',
            'imageUrl' => 'nullable',
            'redirectUrl'=> 'nullable',
            'category_id' => 'required',
        ]);
    
        $banner->update($request->all());
     
        return redirect()->route('banners.index')
                        ->with('success','Banner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
    
        return redirect()->route('banners.index')
                        ->with('success','Banner deleted successfully');
    }
}
