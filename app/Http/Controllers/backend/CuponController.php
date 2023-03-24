<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    public function cuponList(){
        $cupons = Cupon::all();
        return view('backend.pages.cupon.all_cupon', compact('cupons'));
    } // End method

    public function cuponForm(){
        return view('backend.pages.cupon.create_cupon');
    } // End method

    public function cuponStore(){

    } // End method

    public function cuponEdit(){

    } // End method

    public function cuponUpdate(){

    } // End method

    public function cuponDelete(){

    } // End method

    public function cuponView(){

    }
}
