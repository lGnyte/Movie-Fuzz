<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    public function submit(Request $request, ReviewService $reviewService)
    {
        $data = $request->only(['user_id', 'movie_id', 'rating', 'title', 'description']);
        $reviewService->create($data);
        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
