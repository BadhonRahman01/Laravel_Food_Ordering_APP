<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $banners = Banner::all();
       

        //$newBanner = json($banner);
        foreach ($banners as $banner) {
            if($banner->imageUrl == null){
            $banner->imageUrl = " ";

        }
        $category = Category::find($banner->category_id);
        // if($category){
        //     unset($category->headers,$category->exception,$category->created_at,$category->updated_at);
        //     if($category->imageUrl == null){
        //         $category->imageUrl = " ";
        //     }
        //     $banner->category = response()->json($category);
        // }
        $banner->image_url = $banner->imageUrl;
        //$banner->image_url = url($banner->imageUrl);
        $banner->category_name = $category->name;
        //unset($banner->imageUrl);
        unset($banner->created_at,$banner->updated_at, $banner->redirectUrl,$banner->category_id,$banner->imageUrl,$banner->banner_id);
        }
        return response()->json([
            'status' => true,
            'data' => $banners,
            'message' => 'Banner list Loaded successfully'
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
        try {
        $request->validate([
            'banner_id' => 'required',
            'title' => 'required',
            'imageUrl' => 'nullable',
            'redirectUrl'=> 'nullable',
            'category_id' => 'required',
            
        ]);
    

        $newBanner = new Banner([
            'banner_id' => $request->get('banner_id'),
            'title' => $request->get('title'),
            'imageUrl' => $request->get('imageUrl'),
            'redirectUrl' => $request->get('redirectUrl'),
            'category_id' => $request->get('category_id')
          ]);
          //Banner::create($newBanner->all());
          
          $newBanner->save();
      
          return response()->json([
            'status' => true,
            'data' => $newBanner,
            'message' => 'Banner Added successfully.'
        ]);

        } catch (Exception $e) {
            return response()->json([
                'status'        => false,
                'message'       => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        try{
            $b = Banner::find($banner->id);
            return response()->json([
                'status' => true,
                'data' => $b,
                'message' => 'Banner showed successfully'
            ]);

        } catch(Exception $e) {
            return response()->json([
                'status'        => false,
                'message'       => $e->getMessage()
            ]);
        }

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
        try {
        $request->validate([
            'banner_id' => 'required',
            'title' => 'required',
            'category_id' => 'required',
        ]);
        $banr = Banner::find($banner->id);

        $banr->banner_id = $request->get('banner_id');
        $banr->title = $request->get('title');
        $banr->imageUrl = $request->get('imageUrl');
        $banr->redirectUrl = $request->get('redirectUrl');
        $banr->category_id = $request->get('category_id');
        $banr->update();
        unset($banr->created_at,$banr->updated_at, $banr->redirectUrl);
        if($banr->imageUrl == null){
            $banr->imageUrl = " ";
        }
        return response()->json([
            'status' => true,
            'data' => $banr,
            'message' => 'Banner updated successfully'
        ]);
    } catch (Exception $e) {
        return response()->json([
            'status'        => false,
            'message'       => $e->getMessage()
        ]);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
    //     $banr = Banner::find($banner->id);
    //     $banr->delete();

    // return response()->json($banr::all());
    try {
        // $banner->validate([
        //     'id' => 'required'
        // ]);
        $banr = Banner::find($banner->id);
        if(!$banr)
        {
            return response()->json([
                'status' => false
            ]);
        }
        $banr->delete();
        return response()->json([
            'status' => true,
            'message' => 'Banner deleted successfully'
        ]);
    } catch (Exception $e) {
        return response()->json([
            'status'        => false,
            'message'       => $e->getMessage()
        ]);
    }
    }
}
