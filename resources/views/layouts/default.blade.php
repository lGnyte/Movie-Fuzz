@extends('layouts.master')
@section('body')
<nav class="w-64 flex pt-20 flex-col fixed h-[100vh] text-white bg-primary">
  <x-mdi-movie-filter class="self-center w-24 h-24 text-white" />
  <h1 class="mt-2 mb-8 text-4xl font-bold text-center font-title">MovieFuzz</h1>
  <div class="[&>a]:flex [&>a]:gap-5 [&>a]:px-8 [&>a]:duration-200 [&>a]:py-2 [&>a]:mx-2 [&>a]:rounded-md text-lg font-roboto">
    <a href="{{ route('home') }}" class="hover:bg-secondary">
      <x-mdi-home class="w-6 h-6 text-white"/>
      Home
    </a>
    <a class="cursor-pointer hover:bg-secondary">
      <x-mdi-movie-open class="w-6 h-6 text-white"/>
      Movies
    </a>
    <a class="cursor-pointer hover:bg-secondary">
      <x-mdi-label-multiple-outline class="w-6 h-6 text-white" />
      Labels
    </a>
  </div>
  <hr class="mt-auto">
  <div class="my-4 text-center">
    <p class="text-sm text-gray-500">&copy;2024 MovieFuzz <br>All rights reserved.</p>
  </div>
</nav>

<div class="flex flex-col ml-64">
  <header class="flex items-center h-16 px-6 bg-white shadow-sm">
    @yield('breadcrumbs')
    <form class="inline-flex items-center pl-4 ml-auto rounded-full select-none w-96 bg-surface">
      <button type="submit">
        <x-fas-search class="w-6 h-6 text-accent"/>
      </button>
      <input type="text" name="search" id="search" placeholder="Search movies, lables or users" class="flex-1 py-2 pl-3 ml-4 rounded-r-full bg-surface focus:outline-none focus:ring-1 focus:ring-primary">
    </form>
    <a href="{{ route('login') }}" class="px-4 py-2 ml-10 font-bold text-white rounded-lg font-lg bg-accent">Sign In</a>
  </header>
  
  <main class="p-4">
    @yield('content')
  </main>

  <!-- <footer class="h-40 py-4 m-2 mt-auto bg-white rounded-md">
    Footer
  </footer> -->
</div>
@endsection
