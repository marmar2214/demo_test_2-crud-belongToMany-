<?php

namespace App\Http\Controllers;

use Illuminagte\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $default = [
            'title' => 'Home Page',
            'content' => 'Welcome to the home page.'
        ];
        return view('home', $default);
    }
}
