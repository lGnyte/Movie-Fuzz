<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Movie Fuzz - @yield('title')</title>
	@vite('resources/css/app.css')
</head>
<body class="font-sans antialiased grid grid-cols-12 min-h-screen">
  @section('header')
  <header class="col-span-12 bg-gray-800 text-white py-4">
    Header
  </header>
  @show

  @section('sidebar')
  <nav class="col-span-2 bg-gray-200">
    Sidebar
  </nav>
  @show

  <main class="col-span-10 bg-white p-4">
    @yield('content')
  </main>

  @section('footer')
  <footer class="col-span-12 bg-gray-800 text-white py-4">
    Footer
  </footer>
  @show

</body>
</html>
