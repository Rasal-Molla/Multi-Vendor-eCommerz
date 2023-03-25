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

    public function slideForm()
    {
        return view('backend.pages.slider.create_slider');
    } // End method

    public function slideStore(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'short_title' => 'required',
            'image' => 'required',
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = date('Ymdhmi') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/slides', $image);
        }
        Slider::Create([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'image' => $image,
        ]);
        notify()->success('Slider Created successfully');
        return redirect()->back();
    } // End method

    public function slideEdit()
    {
    } // End method

    public function cslidepdate()
    {
    } // End method

    public function slideDelete($id)
    {
        $slide = Slider::find($id);
        $image = $slide->image;
        unlink(public_path().'/slides/'.$image);
        Slider::findOrFail($id)->delete();
        notify()->success('Slider deleted successfully');
        return redirect()->back();
    } // End method

    public function slideView()
    {
    }
}
