@extends('layouts.centered')
@section('title', 'Register')
@section('content')
  <h2 class="inline-block text-4xl font-bold border-b-4 border-accent font-title">Create a New Account</h2>
  <form class="px-8 py-4 mx-auto mt-10 bg-white shadow-md select-none rounded-xl w-96">
    <x-mdi-account-plus-outline class="mx-auto mb-10 w-28 h-28 text-accent" />
    <label class="flex items-center w-full p-2 mb-2 border-gray-700 rounded-lg bg-surface">
      <span>
        <x-mdi-email class="w-8 h-8 pr-2 text-gray-500 border-r" />
      </span>
      <input type="email" name="email" id="email" class="flex-1 px-3 text-lg bg-transparent focus:outline-none" placeholder="E-mail" required>
    </label>
    <label class="flex items-center w-full p-2 mb-2 border-gray-700 rounded-lg bg-surface">
      <span>
        <x-mdi-account class="w-8 h-8 pr-2 text-gray-500 border-r" />
      </span>
      <input type="text" name="username" id="username" class="flex-1 px-3 text-lg bg-transparent focus:outline-none" placeholder="Username" required>
    </label>
    <label class="flex items-center w-full p-2 mb-2 border-gray-700 rounded-lg bg-surface">
      <span>
        <x-mdi-lock class="w-8 h-8 pr-2 text-gray-500 border-r" />
      </span>
      <input type="password" name="password" id="password" class="flex-1 px-3 text-lg bg-transparent focus:outline-none" placeholder="Password" required>
    </label>
    <label class="flex items-center w-full p-2 mb-3 border-gray-700 rounded-lg bg-surface">
      <span>
        <x-mdi-lock-check class="w-8 h-8 pr-2 text-gray-500 border-r" />
      </span>
      <input type="password" name="confirmPassword" id="confirmPassword" class="flex-1 px-3 text-lg bg-transparent focus:outline-none" placeholder="Confirm Password" required>
    </label>
    <div class="flex items-start [&>*]:cursor-pointer text-sm font-semibold select-none text-left">
      <input type="checkbox" name="terms" id="terms" class="mt-1.5 mr-2">
      <label for="terms">
        By continuing, you agree to the
        <a class="text-accent hover:underline">Terms of Service</a>
        and our
        <a class="text-accent hover:underline">Privacy Policy</a>.
      </label>
    </div>

    <button type="submit" class="w-full py-2 mt-12 text-xl font-bold text-white duration-200 rounded-lg bg-accent hover:bg-secondary">Sign Up</button>
    <p class="mt-4 text-center">Already a member? <a href="{{ route('login') }}" class="font-semibold text-accent">Login</a></p>
  </form>
@endsection
