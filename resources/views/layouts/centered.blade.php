@extends('layouts.master')
@section('body')
<header class="flex items-center justify-center h-16 px-6 bg-white shadow-md center">
  <a href="{{ route('home') }}" class="text-4xl font-bold duration-200 font-title hover:text-accent">MovieFuzz</a>
</header>
<main class="pt-16 text-center">
  @yield('content')
</main>
@endsection