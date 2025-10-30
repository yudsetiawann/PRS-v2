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
  <link href="https://fonts.googleapis.com/css2?family=Cascadia+Code:ital,wght@0,200..700;1,200..700&display=swap"
    rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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

    [x-cloak] {
      display: none !important;
    }
  </style>
</head>

<body class="h-full bg-gray-700"> {{-- bg-[url(/public/img/bg3.jpg)] bg-cover bg-center --}}
  <div class="min-h-full" x-data="{ buka: false }">

    <x-navbar />

    <x-header :title="$title" />

    <main>
      <div>
        {{ $slot }}
      </div>
    </main>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  @stack('script')
</body>

</html>
