<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Dashboard</title>

  <!-- Fonts -->
  <link rel="icon" type="image/png" href="{{ asset('img/PRS.png') }}">
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style type="text/css">
    * {
      cursor: url(https://ani.cursors-4u.net/cursors/cur-13/cur1156.ani),
        url(https://ani.cursors-4u.net/cursors/cur-13/cur1156.png),
        auto !important;
    }

    a:hover,
    button:hover,
    [role="button"]:hover,
    input[type="submit"]:hover,
    .btn:hover {
      cursor: url(https://cur.cursors-4u.net/cursors/cur-3/cur291.ani),
        url(https://cur.cursors-4u.net/cursors/cur-3/cur291.png),
        pointer !important;
    }
  </style>
  @stack('style')
</head>

<body class="font-sans antialiased">
  <div class="min-h-screen bg-gradient-to-br from-[#11182B] via-[#283559] to-[#7C3AED] overflow-hidden shadow-xs">
    @include('layouts.navigation')

    <!-- Page Heading -->
    {{-- @isset($header)
      <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          {{ $header }}
        </div>
      </header>
    @endisset --}}

    <!-- Page Content -->
    <main>
      {{ $slot }}
    </main>
  </div>
  <x-footer />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  @stack('script')
</body>

</html>
