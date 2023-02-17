<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function categoryList(){

        $categories = Category::latest()->get();
        return view('backend.pages.category.all_category', compact('categories'));

    }

    public function categoryForm(){

        return view('backend.pages.category.create_category');

    }

    public function categoryStore(Request $request){

        $request->validate([

            'category_name'=>'required|unique:categories',
            'category_image'=>'required'

        ]);

        $categoryRename = null;
        if($request->hasFile('category_image')){

            $categoryRename = date('Ymdhmi').'.'. $request->file('category_image')->getClientOriginalExtension();
            $request->file('category_image')->storeAs('/categories', $categoryRename);
        }

        Category::create([

            'category_name'=>$request->category_name,
            'category_slug'=>strtolower(str_replace('','-',$request->category_name)),
            'category_image'=>$categoryRename

        ]);

        return redirect()->back()->with('message', 'Category added successful!');

    }

    public function categoryEdit($id){

        $categoryEdit = Category::find($id);
        return view('backend.pages.category.edit_category', compact('categoryEdit'));

    }

    public function categoryUpdate(Request $request, $id){

        $request->validate([

            'category_name'=>'required',

        ]);

        $categoryUpdate = Category::find($id);
        $imageUpdate = $categoryUpdate->category_image;
        if($request->hasFile('category_image')){
            $removeImage = public_path().'/categories/'.$imageUpdate;
            File::delete($removeImage);
            $imageUpdate = date('Ymdhmi').'.'. $request->file('category_image')->getClientOriginalExtension();
            $request->file('category_image')->storeAs('/categories', $imageUpdate);
        }

        $categoryUpdate->update([

            'category_name'=>$request->category_name,
            'category_slug'=>strtolower(str_replace('','-',$request->category_name)),
            'category_image'=>$imageUpdate

        ]);

        return redirect()->route('all.category')->with('message', 'Category update successful!');

    }

    public function categoryDelete($id){

        $categoryDelete = Category::findOrFail($id);
        $image = $categoryDelete->category_image;
        unlink(public_path().'/categories/'.$image);

        Category::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Category delete successful!');

    }
}
