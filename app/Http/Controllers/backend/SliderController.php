<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function slideList()
    {
        $slides = Slider::latest()->get();
        return view('backend.pages.slider.all_slider', compact('slides'));
    } // End method

    public function slideCreate()
    {
    } // End method

    public function slideStore()
    {
    } // End method

    public function slideEdit()
    {
    } // End method

    public function cslidepdate()
    {
    } // End method

    public function slideDelete()
    {
    } // End method

    public function slideView()
    {
    }
}
