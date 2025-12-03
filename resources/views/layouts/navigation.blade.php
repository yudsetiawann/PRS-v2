<nav x-data="{ buka: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)"
  :class="{ 'bg-slate-900/80 shadow-lg backdrop-blur-md': scrolled, 'bg-slate-900/60 backdrop-blur-sm': !scrolled }"
  class="fixed top-0 w-full z-50 border-b border-slate-700/50 transition-all duration-300">

  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">

      <div class="flex items-center gap-8">
        <a href="/" class="flex shrink-0 items-center gap-3 group">
          <div class="relative">
            <div
              class="absolute -inset-1 bg-indigo-500 rounded-full opacity-0 group-hover:opacity-50 blur transition duration-500">
            </div>
            <img class="relative size-10 md:size-11 transition-transform duration-300 group-hover:scale-105"
              src="{{ asset('img/PRS.png') }}" alt="Pixel Rhythm Society" />
          </div>
          <h2
            class="text-xl font-bold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400 transition-all duration-300 group-hover:to-indigo-300">
            PRS
          </h2>
        </a>

        <div class="hidden md:block">
          <div class="flex items-baseline space-x-1">
            <x-my-nav-link href="/" :current="request()->is('/')"
              class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->is('/') ? 'text-white bg-white/10' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">Home</x-my-nav-link>
            <x-my-nav-link href="/posts" :current="request()->is('posts')"
              class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->is('posts') ? 'text-white bg-white/10' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">Blog</x-my-nav-link>
            <x-my-nav-link href="/about" :current="request()->is('about')"
              class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->is('about') ? 'text-white bg-white/10' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">About</x-my-nav-link>
            <x-my-nav-link href="/contact" :current="request()->is('contact')"
              class="px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request()->is('contact') ? 'text-white bg-white/10' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">Contact</x-my-nav-link>
          </div>
        </div>
      </div>

      <div class="hidden md:block">
        <div class="ml-4 flex items-center md:ml-6">
          @if (Auth::check())
            <div class="relative ml-3" x-data="{ open: false }">
              <button type="button" @click="open = !open" @click.away="open = false"
                class="relative flex max-w-xs items-center rounded-full bg-slate-800 text-sm focus:outline-none ring-2 ring-slate-700 hover:ring-indigo-500 transition-all duration-300 group"
                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <img class="size-9 rounded-full object-cover"
                  src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/default-avatar.jpg') }}"
                  alt="{{ Auth::user()->name }}" />
                <span
                  class="hidden lg:block ml-3 mr-2 text-sm font-medium text-slate-300 group-hover:text-white transition-colors">
                  {{ Auth::user()->name }}
                </span>
                <svg class="hidden lg:block w-4 h-4 text-slate-500 group-hover:text-white transition-colors mr-2"
                  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>

              <div x-show="open" x-cloak style="display: none;"
                x-transition:enter="transition ease-out duration-200 transform"
                x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150 transform"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-xl bg-slate-800/95 backdrop-blur-xl py-2 shadow-2xl ring-1 ring-slate-700 focus:outline-none border border-slate-700/50"
                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">

                <div class="px-4 py-3 border-b border-slate-700/50 mb-1">
                  <p class="text-xs text-slate-400">Signed in as</p>
                  <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->username }}</p>
                </div>

                @if (Auth::user()->is_admin ?? false)
                  <a href="{{ route('admin.index') }}"
                    class="group flex items-center px-4 py-2 text-sm text-yellow-400 hover:bg-yellow-500/10 hover:text-yellow-300 transition-colors border-b border-slate-700/30"
                    role="menuitem">
                    <svg class="mr-3 h-4 w-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                      </path>
                    </svg>
                    Admin Panel
                  </a>
                @endif

                <a href="/profile"
                  class="group flex items-center px-4 py-2 text-sm text-slate-300 hover:bg-indigo-500/10 hover:text-indigo-400 transition-colors"
                  role="menuitem">
                  <svg class="mr-3 h-4 w-4 text-slate-400 group-hover:text-indigo-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                  </svg>
                  Your Profile
                </a>
                <a href="/dashboard"
                  class="group flex items-center px-4 py-2 text-sm text-slate-300 hover:bg-indigo-500/10 hover:text-indigo-400 transition-colors"
                  role="menuitem">
                  <svg class="mr-3 h-4 w-4 text-slate-400 group-hover:text-indigo-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                  </svg>
                  Dashboard
                </a>

                <div class="border-t border-slate-700/50 mt-1 pt-1">
                  <form method="POST" action="/logout">
                    @csrf
                    <button type="submit"
                      class="group flex w-full items-center px-4 py-2 text-sm text-slate-300 hover:bg-red-500/10 hover:text-red-400 transition-colors"
                      role="menuitem">
                      <svg class="mr-3 h-4 w-4 text-slate-400 group-hover:text-red-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                      </svg>
                      Log out
                    </button>
                  </form>
                </div>
              </div>
            </div>
          @else
            <div class="flex items-center gap-4">
              <a href="/login"
                class="text-sm font-medium text-slate-300 hover:text-white transition-colors">Login</a>
              <a href="/register"
                class="rounded-full bg-indigo-600 px-5 py-2 text-sm font-medium text-white shadow-lg shadow-indigo-500/20 hover:bg-indigo-500 hover:shadow-indigo-500/40 hover:-translate-y-0.5 transition-all duration-300">Register</a>
            </div>
          @endif
        </div>
      </div>

      <div class="-mr-2 flex md:hidden">
        <button type="button" @click="buka= !buka"
          class="inline-flex items-center justify-center rounded-md p-2 text-slate-400 hover:bg-slate-800 hover:text-white focus:outline-none ring-1 ring-transparent focus:ring-slate-700 transition-colors">
          <span class="sr-only">Open main menu</span>
          <svg :class="{ 'hidden': buka, 'block': !buka }" class="size-6" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg :class="{ 'block': buka, 'hidden': !buka }" class="hidden size-6" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <div x-show="buka" x-cloak style="display: none;" x-collapse
    class="md:hidden bg-slate-900/95 backdrop-blur-xl border-b border-slate-700" id="mobile-menu">
    <div class="space-y-1 px-4 py-4">
      <x-my-nav-link
        class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('/') ? 'bg-indigo-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
        href="/" :current="request()->is('/')">Home</x-my-nav-link>
      <x-my-nav-link
        class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('posts') ? 'bg-indigo-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
        href="/posts" :current="request()->is('posts')">Blog</x-my-nav-link>
      <x-my-nav-link
        class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('about') ? 'bg-indigo-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
        href="/about" :current="request()->is('about')">About</x-my-nav-link>
      <x-my-nav-link
        class="block px-3 py-2 rounded-md text-base font-medium {{ request()->is('contact') ? 'bg-indigo-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
        href="/contact" :current="request()->is('contact')">Contact Us</x-my-nav-link>
    </div>

    <div class="border-t border-slate-700 pt-4 pb-6">
      @if (Auth::check())
        <div class="flex items-center px-5 mb-4">
          <div class="shrink-0"><img class="size-10 rounded-full object-cover ring-2 ring-slate-600"
              src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/default-avatar.jpg') }}"
              alt="{{ Auth::user()->name }}" /></div>
          <div class="ml-3">
            <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
            <div class="text-sm font-medium text-slate-400">{{ Auth::user()->email }}</div>
          </div>
        </div>
        <div class="space-y-1 px-4">
          @if (Auth::user()->is_admin ?? false)
            <a href="{{ route('admin.index') }}"
              class="block rounded-md px-3 py-2 text-base font-medium text-yellow-400 hover:bg-slate-800 transition-colors">Admin
              Panel</a>
          @endif
          <a href="/profile"
            class="block rounded-md px-3 py-2 text-base font-medium text-slate-300 hover:bg-slate-800 hover:text-indigo-400 transition-colors">Your
            Profile</a>
          <a href="/dashboard"
            class="block rounded-md px-3 py-2 text-base font-medium text-slate-300 hover:bg-slate-800 hover:text-indigo-400 transition-colors">Dashboard</a>
          <form method="POST" action="/logout"> @csrf <button type="submit"
              class="block w-full text-left rounded-md px-3 py-2 text-base font-medium text-slate-300 hover:bg-red-900/20 hover:text-red-400 transition-colors">Log
              out</button> </form>
        </div>
      @else
        <div class="px-4 space-y-3">
          <a href="/login"
            class="block w-full text-center rounded-md px-3 py-2 text-base font-medium text-slate-300 hover:bg-slate-800 hover:text-white border border-slate-600">Login</a>
          <a href="/register"
            class="block w-full text-center rounded-md px-3 py-2 text-base font-medium text-white bg-indigo-600 hover:bg-indigo-500 shadow-lg shadow-indigo-500/20">Register</a>
        </div>
      @endif
    </div>
  </div>
</nav>
