@extends('layouts.centered')
@section('title', 'Sign In')
@section('content')
  <h2 class="inline-block text-4xl font-bold border-b-4 border-accent font-title">Sign In to Your Account</h2>
  <form class="px-8 py-4 mx-auto mt-10 bg-white shadow-md rounded-xl w-96">
    <x-mdi-account-circle-outline class="mx-auto mb-10 w-28 h-28 text-accent" />
    <label class="flex items-center w-full p-2 mb-2 border-gray-700 rounded-lg bg-surface">
      <x-mdi-account class="w-8 h-8 pr-2 text-gray-500 border-r" />
      <input type="text" name="username" id="username" class="flex-1 px-3 text-lg bg-transparent focus:outline-none" placeholder="Username" required>
    </label>
    <label class="flex items-center w-full p-2 mb-1 border-gray-700 rounded-lg bg-surface">
      <x-mdi-lock class="w-8 h-8 pr-2 text-gray-500 border-r" />
      <input type="password" name="password" id="password" class="flex-1 px-3 text-lg bg-transparent focus:outline-none" placeholder="Password" required>
    </label>
    <div class="flex justify-between text-xs font-semibold text-accent">
      <div class="flex items-center [&>*]:cursor-pointer">
        <input type="checkbox" name="remember" id="remember" class="mr-1">
        <label for="remember">Remember me</label>
      </div>
      <a>Forgot password?</a>
    </div>
    <button type="submit" class="w-full py-2 mt-10 text-xl font-bold text-white rounded-lg bg-accent">Sign In</button>
    <p class="mt-4 text-center">Don't have an account? <a class="font-semibold text-accent">Register</a></p>
  </form>
@endsection
