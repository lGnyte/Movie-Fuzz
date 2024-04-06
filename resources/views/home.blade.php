@extends('layouts.main')
@section('title', 'Home Page')
@section('breadcrumbs')
  <div class="select-none">
    &lt;
    <span class="underline">Home</span>
    /
  </div>
@endsection

@section('content')
  <h1 class="my-4 text-4xl font-bold font-title">Welcome to <span class="text-accent">MovieFuzz</span>!</h1>
  <p class="mb-2 text-xl font-semibold">Explore a variety of movies based on... <span class="text-2xl font-title text-bold">Quirky Reviews</span>!</p>
  <p class="text-lg">Instead of generic ratings, users categorize movies with fun and quirky labels. Select your next movie based on the labels you love!</p>
  <hr class="my-6">
  <h2 class="inline-block mb-4 text-2xl font-bold border-b-2 font-title border-accent">Trending Labels</h2>
  <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
    <div class="p-4 bg-white rounded-md shadow-md">
      <h3 class="mb-2 text-xl font-semibold">Action-packed</h3>
      <p class="text-lg">Movies that are full of action and excitement!</p>
    </div>
    <div class="p-4 bg-white rounded-md shadow-md">
      <h3 class="mb-2 text-xl font-semibold">Heartwarming</h3>
      <p class="text-lg">Movies that will make you feel warm and fuzzy inside!</p>
    </div>
    <div class="p-4 bg-white rounded-md shadow-md">
      <h3 class="mb-2 text-xl font-semibold">Mind-bending</h3>
      <p class="text-lg">Movies that will make you question reality!</p>
    </div>
  </div>
  <button class="font-bold text-accent">See more</button>
@endsection