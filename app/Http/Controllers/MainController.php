<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function login()
    {
        return view('frontend.users.login');
    }
    public function signup()
    {
        return view('frontend.users.signup');
    }
    public function forgetpasswword()
    {
        return view('frontend.users.forget_passwword');
    }
}
