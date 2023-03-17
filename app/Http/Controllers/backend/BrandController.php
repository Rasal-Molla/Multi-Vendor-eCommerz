<?php

namespace App\Http\Controllers\backend;

use notify;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function brandList(){

        $brands = Brand::latest()->get();
        return view('backend.pages.brand.all_brand', compact('brands'));

    }

    public function brandForm(){

        return view('backend.pages.brand.create_brand');

    }

    public function brandStore(Request $request){

        $request->validate([

            'brand_name'=>'required|unique:brands',
            'brand_image'=>'required'

        ]);

        $brandRename = null;
        if($request->hasFile('brand_image')){

            $brandRename = date('Ymdhmi').'.'. $request->file('brand_image')->getClientOriginalExtension();
            $request->file('brand_image')->storeAs('/brands', $brandRename);
        }

        Brand::create([

            'brand_name'=>$request->brand_name,
            'brand_slug'=>strtolower(str_replace('','-',$request->brand_name)),
            'brand_image'=>$brandRename

        ]);

        return redirect()->back();

    }

    public function brandEdit($id){

        $brandEdit = Brand::find($id);
        return view('backend.pages.brand.edit_brand', compact('brandEdit'));

    }

    public function brandUpdate(Request $request, $id){

        $request->validate([

            'brand_name'=>'required|unique:brands',

        ]);

        $brandUpdate = Brand::find($id);
        $imageUpdate = $brandUpdate->brand_image;
        if($request->hasFile('brand_image')){
            $removeImage = public_path().'/brands/'.$imageUpdate;
            File::delete($removeImage);
            $imageUpdate = date('Ymdhmi').'.'. $request->file('brand_image')->getClientOriginalExtension();
            $request->file('brand_image')->storeAs('/brands', $imageUpdate);
        }

        $brandUpdate->update([

            'brand_name'=>$request->brand_name,
            'brand_slug'=>strtolower(str_replace('','-',$request->brand_name)),
            'brand_image'=>$imageUpdate

        ]);

        return redirect()->route('all.brand')->with('message', 'Brand update successful!');

    }

    public function brandDelete($id){

        $brandDelete = Brand::findOrFail($id);
        $image = $brandDelete->brand_image;
        unlink(public_path().'/brands/'.$image);

        Brand::findOrFail($id)->delete();
        return redirect()->back();

    }
}
