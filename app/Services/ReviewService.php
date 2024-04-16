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
}