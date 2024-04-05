@extends ('layouts.main')
<form action="{{route('form.submit') }}" method="POST" class="form">
  <h1>My form</h1>
  @csrf
  <input type="text" name="username" placeholder="My username">
  <button>submit</button>
</form>