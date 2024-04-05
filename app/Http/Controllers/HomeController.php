<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('home', ['name' => $request->get('name', 'no name')]);
    }

    // public function test()
    // {
    //     return view('fp.test');
    // }

    // public function user(Request $request, $username)
    // {
    //     return view('welcome', ['name' => $username]);
    // }
}
