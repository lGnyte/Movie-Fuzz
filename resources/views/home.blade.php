@extends('layouts.default')
@section('title', 'Home Page')
@section('breadcrumbs')
  <div class="select-none">
    &lt;
    <span class="underline">Home</span>
    /
  </div>
@endsection

@section('content')
@guest
  <h2 class="my-4 text-4xl font-bold font-title">Welcome to <span class="text-accent">MovieFuzz</span>!</h2>
  <p class="mb-2 text-xl font-semibold">Explore a variety of movies based on... <span class="text-2xl font-title text-bold">Quirky Reviews</span>!</p>
  <p class="text-lg">Instead of generic ratings, users categorize movies with fun and quirky reviews. Select your next movie based on the reviews from the community!</p>
@endguest
@auth
  <h2 class="my-4 text-4xl font-bold font-title">Welcome back, <span class="text-accent">{{ auth()->user()->name }}</span>!</h2>
@endauth
  <hr class="my-6">
  @if (count($movies) > 0)
    <h3 class="text-2xl font-bold font-title">Popular Movies Now</h3>
    <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      @foreach ($movies as $movie)
        <div class="flex flex-col items-center justify-center p-4 bg-white border border-gray-200 rounded-lg shadow-md">
          <a href="{{ route('movies.individual', $movie->id) }}">
            <img src="{{ "https://image.tmdb.org/t/p/h100" . $movie->poster_path }}" alt="{{ $movie->title }}" class="w-48 h-72 object-cover rounded-lg">
          </a>
          <div class="mt-4 text-center">
            <a href="{{ route('movies.individual', $movie->id) }}" class="text-lg font-semibold font-title hover:text-accent duration-200">{{ $movie->title }}</a>
            <p class="mt-2 text-sm font-semibold text-gray-600">Release date: {{ $movie->release_date }}</p>
          </div>
        </div>
      @endforeach
    </div>
  @endif
@endsection