@extends('layouts.default')
@section('title', 'Browse Movies')
@section('breadcrumbs')
  <div class="select-none">
    &lt;
    <a href="{{ route('home') }}" class="text-primary">Home</a>
    /
    <span class="underline">Movies</span>
  </div>
@endsection
@section('content')
  <h1 class="text-4xl font-title font-bold mb-6">Find your Next Movie to Watch</h1>
  <p class="text-lg mb-4">Not sure if you will like the movie? Browse titles and see what the community has to say in quirky reviews.</p>

  <form method="POST" class="inline-flex rounded-md items-center border-2 pl-4 ml-auto mr-6 select-none w-96 bg-white" action="{{ route('movies.search') }}">
    @csrf
    <button type="submit">
      <x-fas-search class="w-6 h-6 text-accent"/>
    </button>
    <input type="text" name="search" id="search" placeholder="Search movie titles" class="flex-1 py-2 pl-3 ml-4 focus:outline-none focus:ring-1 focus:ring-primary">
  </form>

  @if (!isset($results))
    <p class="mt-8 text-lg">Search for a movie title to get started.</p>
  @elseif (count($results) == 0)
    <p class="mt-8 text-lg">No movies found. Try searching for another title.</p>
  @else
    <div class="grid grid-cols-1 gap-4 mt-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      @foreach ($results as $movie)
        <a href="{{ route('movies.individual', $movie->id )}}" class="flex flex-col items-center p-4 bg-surface shadow-md rounded-xl">
          <img src="{{ "https://image.tmdb.org/t/p/h100" . $movie->poster_path }}" alt="{{ $movie->title }}" class="w-48 h-72 object-cover rounded-lg">
          <h2 class="mt-4 text-xl font-bold font-title">{{ $movie->title }}</h2>
          <p class="mt-2 text-sm text-gray-500">Release date: {{ $movie->release_date }}</p>
        </a>
      @endforeach
    </div>
  @endif
@endsection

{{-- href="{{ route('movies.show', ['movie' => $movie->id]) }}" --}}