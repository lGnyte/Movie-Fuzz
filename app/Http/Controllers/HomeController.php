<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TMDBService;

class HomeController extends Controller
{
    public function index(Request $request, TMDBService $tmdbService)
    {        
        $movies = $tmdbService->getPopularMovies();
        return view('home', ['movies' => $movies->results]);
    }
}
