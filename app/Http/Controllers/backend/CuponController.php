<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    public function cuponList()
    {
        $cupons = Cupon::all();
        return view('backend.pages.cupon.all_cupon', compact('cupons'));
    } // End method

    public function cuponForm()
    {
        return view('backend.pages.cupon.create_cupon');
    } // End method

    public function cuponStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'value' => 'required',
            'type' => 'required',
            'start' => 'required',
            'end' => 'required',
            'status' => 'required',
        ]);

        Cupon::Create([
            'name' => strtoupper($request->name),
            'value' => $request->value,
            'type' => $request->type,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end,
            'status' => $request->status,
        ]);
        notify()->success('Cupon Created successfully');
        return redirect()->back();
    } // End method

    public function cuponEdit($id)
    {
        $cupon = Cupon::find($id);
        return view('backend.pages.cupon.edit_cupon', compact('cupon'));
    } // End method

    public function cuponUpdate(Request $request, $id)
    {
        $cupon = Cupon::find($id);
        $request->validate([
            'name' => 'required',
            'value' => 'required',
            'type' => 'required',
            'start' => 'required',
            'end' => 'required',
            'status' => 'required',
        ]);

        $cupon->update([
            'name' => strtoupper($request->name),
            'value' => $request->value,
            'type' => $request->type,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end,
            'status' => $request->status,
        ]);
        notify()->success('Cupon Updated successfully');
        return redirect()->route('all.cupon');
    } // End method

    public function cuponDelete($id)
    {
        $cupon = Cupon::find($id);
        if ($cupon) {
            $cupon->delete();
            notify()->success('Cupon deleted successfylly');
            return redirect()->back();
        }else{
            notify()->error('Cupon not found');
            return redirect()->back();
        }
    } // End method

    public function cuponView()
    {
    } // End method
}
