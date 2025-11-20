<!DOCTYPE html class="h-full bg-gray-100">
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }} | PRS</title>
  <link rel="icon" type="image/png" href="{{ asset('img/PRS.png') }}">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cascadia+Code:ital,wght@0,200..700;1,200..700&display=swap" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full bg-gray-700 font-sans antialiased">

  <div class="min-h-screen flex flex-col" x-data="{ buka: false }">

    <x-navbar />

    <x-header :title="$title" />

    <main class="flex-1 w-full flex flex-col">
      {{ $slot }}
    </main>

    <x-footer />

  </div>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  @stack('script')
</body>

</html>
