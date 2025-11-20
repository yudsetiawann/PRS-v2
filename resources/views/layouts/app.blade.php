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
  <style>
    [x-cloak] {
      display: none !important;
    }
  </style>

  {{-- <style type="text/css">
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
  </style> --}}
  @stack('style')
</head>

<body class="font-sans antialiased">
  <div class="min-h-screen bg-slate-900 overflow-hidden shadow-xs flex flex-col">
    @include('layouts.navigation')

    {{-- @isset($header)
        <header class="bg-white shadow-sm">
          <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
          </div>
        </header>
      @endisset --}}

    <main class="flex-1">
      {{ $slot }}
    </main>

    <x-footer />
  </div>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  @stack('script')
</body>

</html>
