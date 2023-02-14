<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registration(){

        return view('backend.pages.registration');

    }

    public function login(){

        return view('backend.pages.login');

    }


    public function forgetPassword(){

        return view('backend.pages.resetPassword');

    }
}
