<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subCategoryList(){
        $subCategories = SubCategory::latest()->get();
        return view('backend.pages.subCategory.all_subCategory', compact('subCategories'));

    }

    public function subCategoryForm(){

        $categories = Category::all();
        return view('backend.pages.subCategory.create_subCategory', compact('categories'));

    }

    public function subCategoryStore(Request $request){

        $request->validate([

            'category_id'=>'required',
            'subCategory_name'=>'required'

        ]);

        SubCategory::create([

            'category_id'=>$request->category_id,
            'subCategory_name'=>$request->subCategory_name,
            'subCategory_slug'=>strtolower(str_replace('','-',$request->subCategory_name))

        ]);

        return redirect()->back()->with('message', 'SubCategory added successful!');

    }

    public function subCategoryEdit($id){

        $categories = Category::all();
        $subCategory = SubCategory::find($id);
        return view('backend.pages.subCategory.edit_subCategory', compact('subCategory', 'categories'));

    }

    public function subCategoryUpdate(Request $request, $id){

        $request->validate([

            'subCategory_name'=>'required',

        ]);

        $subCategoryUpdate = SubCategory::findOrFail($id);

        $subCategoryUpdate->update([

            'category_id'=>$request->category_id,
            'subCategory_name'=>$request->subCategory_name,
            'subCategory_slug'=>strtolower(str_replace('','-',$request->subCategory_name)),

        ]);

        return redirect()->route('all.subcategory')->with('message', 'SubCategory update successful!');

    }

    public function subCategoryDelete($id){

        SubCategory::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'SubCategory delete successful!');

    }
}
