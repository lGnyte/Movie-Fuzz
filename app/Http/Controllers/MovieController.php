<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TMDBService;

class MovieController extends Controller
{
    public function index() {
        return view('movies.browse');
    }

    public function search(Request $request, TMDBService $tmdbService) {
        $query = $request->input('search');
        $results = $tmdbService->searchMovie($query);
        
        return view('movies.browse', ['results' => $results->results]);
    }

    public function individual(Request $request, TMDBService $tmdbService) {
        $id = $request->route('id');
        $movie = $tmdbService->getMovie($id);

        if (!$movie) {
            abort(404);
        }
        
        return view('movies.individual', ['movie' => $movie]);
    }
}
