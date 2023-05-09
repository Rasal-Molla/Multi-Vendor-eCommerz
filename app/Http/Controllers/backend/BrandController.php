<?php

namespace App\Http\Controllers\backend;

use notify;
use toastr;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\BrandMail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    public function brandList(){

        if (request()->ajax()) {
            $data = Brand::all();
            return DataTables::of($data)
                ->addIndexColumn()
                    ->addColumn('date',function ($row){
                    return date('Y-M-d',strtotime($row['created_at']));
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-info btn-sm">View</a>
                        <a href="javascript:void(0)" class="delete btn btn-success btn-sm">Edit</a>
                        <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.pages.brand.all_brand');

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

        $brand=Brand::create([

            'brand_name'=>$request->brand_name,
            'brand_slug'=>strtolower(str_replace('','-',$request->brand_name)),
            'brand_image'=>$brandRename

        ]);

        Mail::to('rasalmolla159401@gmail.com')->send(new BrandMail($brand));

        toastr()->success('Brand added successfully','Brand');
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

        toastr()->success('Brand updated successfully', 'Brand');
        return redirect()->route('all.brand');

    }

    public function brandDelete($id){

        $brandDelete = Brand::findOrFail($id);
        $image = $brandDelete->brand_image;
        unlink(public_path().'/brands/'.$image);

        Brand::findOrFail($id)->delete();
        toastr()->success('Brand deleted successfully','Brand');
        return redirect()->back();

    }
}
