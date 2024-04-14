@extends('layouts.default')
@section('title', $userData->name)
@section('breadcrumbs')
  <div class="select-none">
    &lt;
    <a href="{{ route('home') }}" class="text-primary">Home</a>
    /
    <span class="underline">{{ $userData->name . '\'s Profile' }}</span>
  </div>
@endsection
@section('content')
  <h1 class="mb-10 ml-5 text-4xl font-bold font-title">{{ $userData->name . '\'s Profile' }}</h1>
  <div class="flex">
    <div class="flex flex-col items-center w-1/3">
      <x-mdi-account-box-multiple-outline class="text-gray-500 border-2 w-72 h-72 rounded-xl" />
      <p class="mb-4 font-semibold text-secondary">{{ '@' . $userData->username }}</p>
      <div class="text-left">
        @auth
          <p class="text-lg font-semibold">Email: <span class="font-normal">{{ $userData->email }}</span></p>
        @endauth
        <p class="text-lg font-semibold">Joined: <span class="font-normal">{{ $userData->created_at->diffForHumans() }}</span></p>
      </div>
      @if ($isOwner === true)
        <a href="{{ route('user-profile.edit', ['username' => request()->username]) }}" class="flex items-center px-2 py-1 mt-2 text-lg duration-200 border rounded-md hover:bg-secondary hover:bg-opacity-10 border-secondary text-secondary">
          <x-mdi-account-edit class="w-6 h-6" />
          <span class="ml-2">Edit profile</span>
        </a>
      @endif
      @if (session('success'))
        <div class="px-2 py-1 mt-2 font-semibold text-left text-green-500 border border-green-300 rounded-lg">
          <p>{{ session('success') }}</p>
        </div>
      @endif
    </div>
    <div class="flex-1 px-10 border-l">
      <h2 class="mb-4 text-2xl font-bold font-title">Movie Reviews</h2>
      <p class="w-1/2 px-4 py-2 text-gray-600 border-2 rounded-md">User has no reviews.</p>
    </div>
  </div>
@endsection