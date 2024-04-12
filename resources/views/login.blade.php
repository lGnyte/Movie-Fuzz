@extends('layouts.centered')
@section('title', 'Sign In')
@section('content')
  <h2 class="inline-block text-4xl font-bold border-b-4 border-accent font-title">Sign In to Your Account</h2>
  <form class="px-8 py-4 mx-auto mt-10 bg-white shadow-md select-none rounded-xl w-96" action="{{ route('login.submit') }}" method="POST">
    @csrf
    <x-mdi-account-circle-outline class="mx-auto mb-10 w-28 h-28 text-accent" />
    <label class="flex items-center w-full p-2 mb-2 border-gray-700 rounded-lg bg-surface">
      <span>
        <x-mdi-email class="w-8 h-8 pr-2 text-gray-500 border-r" />
      </span>
      <input type="text" name="login" id="login" class="flex-1 px-3 text-lg bg-transparent focus:outline-none" placeholder="E-mail or Username" required value="{{ old('login') }}">
    </label>
    <label class="flex items-center w-full p-2 mb-1 border-gray-700 rounded-lg bg-surface">
      <span>
        <x-mdi-lock class="w-8 h-8 pr-2 text-gray-500 border-r" />
      </span>
      <input type="password" name="password" id="password" class="flex-1 px-3 text-lg bg-transparent focus:outline-none" placeholder="Password" required value="{{ old('password') }}">
    </label>
    <div class="flex justify-between text-xs font-semibold text-accent">
      <div class="flex items-center [&>*]:cursor-pointer">
        <input type="checkbox" name="remember" id="remember" class="mr-1">
        <label for="remember">Remember me</label>
      </div>
      <a href="{{ route('password.reset') }}">Forgot password?</a>
    </div>

    @if ($errors->any())
      <div class="px-2 py-1 mt-4 font-semibold text-left text-red-500 border border-red-300 rounded-lg">
        <p>{{ $errors->first() }}</p>
      </div>
    @endif

    @if (session('status'))
      <div class="px-2 py-1 mt-4 font-semibold text-left text-green-500 border border-green-300 rounded-lg">
        <p>{{ session('status') }}</p>
      </div>
    @endif

    <button type="submit" class="w-full py-2 mt-6 text-xl font-bold text-white duration-200 rounded-lg bg-accent hover:bg-secondary">Sign In</button>
    <p class="mt-4 text-center">Don't have an account? <a href="{{ route('register') }}" class="font-semibold text-accent">Register</a></p>
  </form>
@endsection
