<?php

namespace App\Services;

use App\Models\Review;
use Illuminate\Contracts\Auth\Guard;

class ReviewService
{
    public function create($data)
    {
        return Review::create($data);
    }

    public function getById($id)
    {
        return Review::find($id);
    }

    public function getAllByMovieId($movieId)
    {
        return Review::where('movie_id', $movieId)->get();
    }

    public function getByMovieIdAndUserId($movieId, $userId)
    {
        return Review::where('movie_id', $movieId)
            ->where('user_id', $userId)
            ->first();
    }

    public function delete($review)
    {
        return $review->delete();
    }
}