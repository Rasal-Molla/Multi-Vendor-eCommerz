<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList(){
        $products = Product::all();
        return view('backend.pages.product.all_product', compact('products'));

    } // End method

    public function productForm(){
        return view('backend.pages.product.create_product');

    } // End method

    public function productStore(Request $request){
        dd($request->all());

    } // End method

    public function productEdit(){

    } // End method

    public function productUpdate(){

    } // End method

    public function productDelete(){

    } // End method

    public function productView(){

    }
}
