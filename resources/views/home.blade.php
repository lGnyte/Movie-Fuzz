@extends('layouts.main')
@section('title', 'Home')

@section('content')
<h1>Home page</h1>
<div class="bg-red-300">
	Hello, {{ $name }}
</div>
@endsection