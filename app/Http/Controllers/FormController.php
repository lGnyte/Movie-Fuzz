<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(){
        return view('fp.form');
    }

    public function submit(Request $request){
        var_dump($request->all());
    }
}
