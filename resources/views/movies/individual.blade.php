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
  <p class="text-lg">Rating: {{ $movie->vote_average }}</p>
  <img src="{{ "https://image.tmdb.org/t/p/original" . $movie->poster_path }}" alt="{{ $movie->title }}" class="w-60 h-80 object-cover rounded-lg">
  <p class="mt-4 text-lg">{{ $movie->overview }}</p>

  <hr class="my-4">

  <h2 class="text-3xl font-title font-bold">User Reviews</h2>
  @if(!isset($reviews) || count($reviews) == 0)
    <p class="text-lg">No reviews yet. Be the first to review this movie!</p>
  @endif
@endsection