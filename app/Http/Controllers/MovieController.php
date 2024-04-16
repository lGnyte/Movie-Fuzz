<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index() {
        return view('movies.browse');
    }

    public function search(Request $request) {
        $query = $request->input('search');
        $results = app(\App\Services\TMDBService::class)->searchMovie($query);
        
        return view('movies.browse', ['results' => $results->results]);
    }
}
