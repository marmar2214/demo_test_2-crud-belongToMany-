<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $default = [
            'title' => 'dashboard',
            'active' => 'dashboard',
        ];

        return view('home', $default);
    }
}
