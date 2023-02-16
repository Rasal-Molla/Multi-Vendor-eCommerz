<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function brandList(){

        $brands = Brand::all();
        return view('backend.pages.all_brand', compact('brands'));

    }

    public function brandForm(){

        return view('backend.pages.create_brand');

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

        return redirect()->back()->with('message', 'Brand added successful!');

    }

    public function brandEdit($id){

        $brandEdit = Brand::find($id);
        return view('backend.pages.edit_brand', compact('brandEdit'));

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

        $brandDelete = Brand::find($id);
        if($brandDelete){

            $brandDelete->delete();

            return redirect()->back()->with('delete', 'Brand delete successful!');

        }else{

            return redirect()->back()->with('notFound', 'Brand not found!');

        }

    }
}