<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title ?? 'Blog System' }} | PRS</title>
  <link rel="icon" type="image/png" href="{{ asset('img/PRS.png') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />

  {{-- Alpine Plugins harus dimuat SEBELUM Alpine Core --}}
  <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full bg-gray-700 font-sans antialiased">

  <div class="min-h-screen flex flex-col" x-data="{ buka: false }">

    {{-- Navbar --}}
    <x-navbar />

    {{-- SLOT UTAMA: Konten halaman akan masuk di sini --}}
    <main class="flex-1 w-full flex flex-col">
      {{ $slot }}
    </main>

    {{-- Footer --}}
    <x-footer />

  </div>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  @stack('script')
</body>

</html>
