@extends('layouts.default')
@section('title', $movie->title)
@section('breadcrumbs')
  <div class="select-none">
    &lt;
    <a href="{{ route('home') }}" class="text-primary">Home</a>
    /
    <span class="underline">{{ $movie->title }}</span>
  </div>
@endsection
@section('content')
  <h1 class="text-4xl font-title font-bold">{{ $movie->title }}</h1>
  <h2 class="text-xl font-title font-semibold mb-2">{{ $movie->tagline }}</h2>
  <p class="text-lg">Released: {{ $movie->release_date }}</p>
  <p class="text-lg">IMDB Rating: {{ $movie->vote_average }}</p>
  <img src="{{ "https://image.tmdb.org/t/p/original" . $movie->poster_path }}" alt="{{ $movie->title }}" class="w-60 h-80 object-cover rounded-lg">
  <p class="mt-4 text-lg">{{ $movie->overview }}</p>

  @auth
    <hr class="my-4">
    @if(session('success'))
      <p class="text-lg text-green-500 mt-2">{{ session('success') }}</p>
    @endif
    @if(isset($review))
      <h2 class="text-3xl font-title font-bold">Your Review</h2>
      <p class="text-lg">Rating: {{ $review->rating }}</p>
      <p class="text-lg">Headline: {{ $review->title }}</p>
      <p class="text-lg">Description: {{ $review->description }}</p>
      <form action="{{ route('review.delete') }}" method="POST">
        @csrf
        <input type="hidden" name="review_id" value="{{ $review->id }}">
        <button type="submit" class="mt-2 px-4 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 duration-200">Delete Review</button>
      </form>
    @else
      <h2 class="text-3xl font-title font-bold">Add a Review</h2>
      <form action="{{ route('review.submit') }}" method="POST" class="mt-4">
        @csrf
        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <label for="rating" class="block text-lg font-semibold">Rating (1-10)</label>
        <input type="number" name="rating" id="rating" min="1" max="10" class="w-20 p-2 border border-gray-300 rounded-lg" required>
        <label for="title" class="block text-lg font-semibold mt-2">Headline</label>
        <input type="text" name="title" id="title" class="w-[500px] p-2 border border-gray-300 rounded-lg" required>
        <label for="description" class="block text-lg font-semibold mt-2">Description</label>
        <textarea name="description" id="description" class="w-[500px] p-2 border border-gray-300 rounded-lg" required></textarea>
        <br>
        <button type="submit" class="mt-2 px-4 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-accent duration-200">Submit Review</button>
      </form>
    @endif
  @endauth

  <hr class="my-4">

  <h2 class="text-3xl font-title font-bold">User Reviews</h2>
  @if(!isset($reviews) || count($reviews) == 0)
    <p class="text-lg">No reviews yet. Be the first to review this movie!</p>
  @else 
    @foreach($reviews as $review)
    <div class="border border-gray-300 rounded-lg p-4 mt-2">
        <p class="text-sm text-gray-500 -mb-1">{{ $review->created_at }}</p>
        <p class="text-lg font-semibold">{{ $review->title }}</p>
        <p>By: <a href="{{ route('user-profile.show', $review->user->username) }}" class="font-semibold">{{ $review->user->name }}</a></p>
        <p class="mb-2">Rating: <span class="font-semibold">{{ $review->rating }}</span></p>
        <p>{{ $review->description }}</p>
      </div>
    @endforeach
  @endif
@endsection