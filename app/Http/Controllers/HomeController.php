<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    protected function dashboard()
    {
        return view('home');
    }
}
