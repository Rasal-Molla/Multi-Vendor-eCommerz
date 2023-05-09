<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public function slideEdit($id)
    {
        $slide = Slider::find($id);
        return view('backend.pages.slider.edit_slider', compact('slide'));
    } // End method

    public function slideUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'short_title' => 'required',
        ]);
        $slide = Slider::find($id);
        $image = $slide->image;
        if ($request->hasFile('image')) {
            $remove = public_path() . '/slides/' . $image;
            File::delete($remove);
            $image = date('Ymdhmi') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/slides', $image);
        }
        $slide->update([
            'title' => $request->title,
            'short_title' => $request->short_title,
            'image' => $image,
        ]);
        notify()->success('Slider Updated successfully');
        return redirect()->route('all.slide');
    } // End method

    public function slideDelete($id)
    {
        $slide = Slider::find($id);
        $image = $slide->image;
        unlink(public_path() . '/slides/' . $image);
        Slider::findOrFail($id)->delete();
        notify()->success('Slider deleted successfully');
        return redirect()->back();
    } // End method

    public function slideView()
    {
    }
}
