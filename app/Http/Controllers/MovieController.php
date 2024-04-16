<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TMDBService;
use App\Services\ReviewService;

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

    public function individual(Request $request, TMDBService $tmdbService, ReviewService $reviewService) {
        $id = $request->route('id');
        $movie = $tmdbService->getMovie($id);

        if (!$movie) {
            abort(404);
        }
        
        $reviews = $reviewService->getAllByMovieId($id);
        
        if(auth()->check()) {
            $review = $reviewService->getByMovieIdAndUserId($id, auth()->user()->id);
            
            //remove review of the current user from the reviews list
            $userId = auth()->user()->id;
            $reviews = $reviews->filter(function($review) use ($userId) {
                return $review->user_id !== $userId;
            });
        }


        return view('movies.individual', ['movie' => $movie,'reviews' => $reviews, 'review' => $review]);
    }
}
