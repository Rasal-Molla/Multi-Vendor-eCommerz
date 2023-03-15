<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function lang(Request $request){
        session()->put('locale', $request->lang);
        app()->setLocale(session()->get('locale'));
        return back();
    }
}
