@extends('layouts.default')
@section('title', 'Edit Profile')
@section('breadcrumbs')
  <div class="select-none">
    &lt;
    <a href="{{ route('home') }}" class="text-primary">Home</a>
    /
    <a href="{{ route('user-profile.show', ['username'=>request()->username]) }}" class="text-primary">{{ $userData->name }}</a>
    /
    <span class="underline">Edit Profile</span>
  </div>
@endsection
@section('content')
  <h1 class="mb-10 ml-5 text-4xl font-bold font-title">Edit Profile</h1>
  <form action="{{ route('user-profile.update', ['username' => request()->username]) }}" class="max-w-[500px]" method="POST">
    @csrf
    <x-mdi-account-box-multiple-outline class="text-gray-500 border-2 w-32 h-32 mb-2 rounded-xl" />
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="{{ $userData->username }}" class="block w-full p-2 mb-5 border border-gray-300 rounded-md">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $userData->name }}" class="block w-full p-2 mb-5 border border-gray-300 rounded-md">
    <div>
      <button type="submit" class="px-4 py-2 text-white bg-accent font-semibold hover:bg-secondary duration-200 rounded-md">Save Changes</button>
      <button type="reset" class="px-4 py-2 border border-gray-300 ml-4 rounded-md hover:bg-secondary hover:bg-opacity-10 duration-200">Reset</button>
    </div>
    @if ($errors->any())
      <div class="px-2 py-1 border rounded-md border-red-500 text-red-500 mt-2 font-bold">
        <p>{{ $errors->first() }}</p>
      </div>
    @endif
    @if (session('info'))
      <div class="px-2 py-1 border rounded-md border-orange-500 text-orange-500 mt-2 font-bold">
        <p>{{ session('info') }}</p>
      </div>
    @endif
  </form>
@endsection