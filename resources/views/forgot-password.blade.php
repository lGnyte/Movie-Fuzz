@extends('layouts.centered')
@section('title', 'Reset Password')
@section('content')
  <h2 class="inline-block text-4xl font-bold border-b-4 border-accent font-title">Reset Password</h2>
  @if(request()->has('token') && request()->has('email'))
    <form id="resetForm" class="px-8 py-4 mx-auto mt-10 bg-white shadow-md select-none rounded-xl w-96" action="{{ route('forgot-password.reset', ['token' => request()->query('token')]) }}" method="POST">
      @csrf
      <x-mdi-key-plus class="mx-auto mb-10 w-28 h-28 text-accent" />
      <p class="mb-4 text-lg">Enter your new password.</p>
      <input type="hidden" name="email" value="{{ request()->email }}">
      <label class="flex items-center w-full p-2 mb-2 border-gray-700 rounded-lg bg-surface">
        <span>
          <x-mdi-lock class="w-8 h-8 pr-2 text-gray-500 border-r" />
        </span>
        <input type="password" name="password" id="password" class="flex-1 px-3 text-lg bg-transparent focus:outline-none" placeholder="New Password" required>
      </label>
      <label class="flex items-center w-full p-2 mb-2 border-gray-700 rounded-lg bg-surface">
        <span>
          <x-mdi-lock-alert class="w-8 h-8 pr-2 text-gray-500 border-r" />
        </span>
        <input type="password" name="password_confirmation" id="password_confirmation" class="flex-1 px-3 text-lg bg-transparent focus:outline-none" placeholder="Confirm Password" required>
      </label>
      <input type="hidden" name="token" value="{{ request()->query('token') }}">
      @if ($errors->any())
        <div class="px-2 py-1 mt-4 font-semibold text-left text-red-500 border border-red-300 rounded-lg">
          <p>{{ $errors->first() }}</p>
        </div>
      @endif
      <button type="submit" class="w-full py-2 mt-2 text-xl font-bold text-white duration-200 rounded-lg bg-accent hover:bg-secondary">Reset Password</button>
    </form>
  @else
    <form class="px-8 py-4 mx-auto mt-10 bg-white shadow-md select-none rounded-xl w-96" action="{{ route('forgot-password.submit') }}" method="POST">
      @csrf
      <x-mdi-key-alert class="mx-auto mb-10 w-28 h-28 text-accent" />
      <p class="mb-4 text-lg">Enter your e-mail address. You will receive a link to reset your password.</p>
      <label class="flex items-center w-full p-2 mb-2 border-gray-700 rounded-lg bg-surface">
        <span>
          <x-mdi-email class="w-8 h-8 pr-2 text-gray-500 border-r" />
        </span>
        <input type="email" name="email" id="email" class="flex-1 px-3 text-lg bg-transparent focus:outline-none" placeholder="E-mail" required value="{{ old('email') }}">
      </label>
      @error('email')
        <div class="px-2 py-1 mt-4 font-semibold text-left text-red-500 border border-red-300 rounded-lg">
          <p>{{ $message }}</p>
        </div>
      @enderror
      @if (session('status'))
        <div class="px-2 py-1 mt-4 font-semibold text-left text-green-500 border border-green-300 rounded-lg">
          <p>{{ session('status') }}</p>
        </div>
      @endif
      <button type="submit" class="w-full py-2 mt-2 text-xl font-bold text-white duration-200 rounded-lg bg-accent hover:bg-secondary">Get Reset Link</button>
      <p class="mt-4 text-center">Remember your password? <a href="{{ route('login') }}" class="font-semibold text-accent">Sign In</a></p>
    </form>
  @endif
@endsection