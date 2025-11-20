<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-slate-300 antialiased bg-slate-900 selection:bg-indigo-500 selection:text-white">

  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden">

    <div
      class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-indigo-600/20 rounded-full mix-blend-screen filter blur-[100px] opacity-30 animate-blob">
    </div>
    <div
      class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-cyan-600/20 rounded-full mix-blend-screen filter blur-[100px] opacity-30 animate-blob animation-delay-2000">
    </div>

    <div class="relative z-10 w-full flex flex-col items-center">
      <div class="mb-8">
        <a href="/" class="flex flex-col items-center gap-2 group">
          <div class="relative">
            <div
              class="absolute -inset-2 bg-gradient-to-r from-indigo-500 to-cyan-500 rounded-full opacity-20 blur-md group-hover:opacity-40 transition duration-500">
            </div>
            <img src="{{ asset('img/PRS.png') }}" alt="prs-logo"
              class="relative w-20 h-20 drop-shadow-2xl transform transition duration-500 group-hover:scale-105">
          </div>
          <span
            class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400 tracking-wider mt-2">Pixel
            Rhythm Society</span>
        </a>
      </div>

      <div
        class="w-full sm:max-w-md px-8 py-10 bg-slate-800/50 backdrop-blur-xl border border-slate-700/50 shadow-2xl sm:rounded-2xl relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-cyan-500"></div>

        {{ $slot }}
      </div>

      <div class="mt-8 text-slate-500 text-sm">
        &copy; {{ date('Y') }} PRS. All rights reserved.
      </div>
    </div>
  </div>
</body>

</html>
