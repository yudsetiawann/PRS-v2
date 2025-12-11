<x-layout :title="$title">
  <section class="pt-20 min-h-screen bg-slate-900 py-12 relative overflow-hidden">

    <div
      class="absolute top-40 left-0 w-96 h-96 bg-indigo-600/20 rounded-full mix-blend-screen filter blur-[100px] opacity-20 pointer-events-none">
    </div>
    <div
      class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-600/20 rounded-full mix-blend-screen filter blur-[100px] opacity-20 pointer-events-none">
    </div>

    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 relative z-10">

      <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6 border-b border-slate-800 pb-8">
        <div class="text-center md:text-left w-full md:w-auto">
          <h1 class="text-3xl md:text-4xl font-bold text-white tracking-tight">
            {{ $title }}
          </h1>
          <p class="mt-2 text-slate-400 text-sm">
            Jelajahi ide dan perspektif baru.
          </p>
        </div>

        <form class="w-full md:max-w-md relative group">
          @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
          @endif

          {{-- Container Flex untuk mensejajarkan Tombol (+) dan Input Search --}}
          <div class="flex items-center gap-3">

            {{-- 1. Tombol Create Post (Hanya muncul jika Login) --}}
            @auth
              <a href="/dashboard/create"
                class="flex-none flex items-center justify-center w-11 h-11 bg-indigo-600 text-white rounded-full shadow-lg hover:bg-indigo-500 hover:scale-105 transition-all duration-300 focus:ring-2 focus:ring-indigo-500/50"
                title="Buat Postingan Baru">
                {{-- Icon Plus (+) --}}
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
              </a>
            @endauth

            {{-- 2. Input Pencarian (Codingan lama Anda, dibungkus div flex-1) --}}
            <div class="relative flex-1">

              {{-- Icon Search (Sudah ada di kode Anda, ini posisinya di dalam input sebelah kiri) --}}
              <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none z-10 text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
              </div>

              <input type="search" name="search"
                class="block w-full py-3 pl-12 pr-4 text-sm text-white bg-slate-800/50 border border-slate-700 rounded-full shadow-lg backdrop-blur-sm focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 focus:outline-none transition-all duration-300 placeholder-slate-500 hover:bg-slate-800/80"
                placeholder="Cari judul atau penulis..." autocomplete="off" value="{{ request('search') }}">
            </div>

          </div>
        </form>
      </div>

      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($posts as $post)
          <article
            class="group flex flex-col h-full bg-slate-800/40 backdrop-blur-sm rounded-2xl border border-slate-700/60 hover:border-indigo-500/50 transition-all duration-300 ease-out transform hover:-translate-y-2 hover:shadow-2xl hover:shadow-indigo-500/10">

            <div class="flex-1 p-6">
              <div class="flex justify-between items-center mb-5">
                <a href="/posts?category={{ $post->category->slug }}">
                  <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-indigo-500/10 text-indigo-300 border border-indigo-500/20 hover:bg-indigo-500/20 transition-colors">
                    {{ $post->category->name }}
                  </span>
                </a>
                <span class="text-xs text-slate-500 flex items-center gap-1">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  {{ $post->created_at->diffForHumans() }}
                </span>
              </div>

              <h2
                class="text-xl font-bold text-white mb-3 leading-tight group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-indigo-400 group-hover:to-cyan-400 transition-all duration-300">
                <a href="/posts/{{ $post->slug }}">
                  {{ $post->title }}
                </a>
              </h2>

              <p
                class="text-slate-400 text-sm leading-relaxed mb-4 line-clamp-3 border-l-2 border-slate-700 pl-3 group-hover:border-indigo-500/50 transition-colors">
                {{ Str::limit(strip_tags($post->body), 120) }}
              </p>
            </div>

            <div class="p-6 pt-0 mt-auto">
              <div class="pt-4 border-t border-slate-700/50 flex items-center justify-between">
                <a href="/userprof/{{ $post->author->username }}" class="flex items-center gap-3 group/author">
                  <div class="relative">
                    <img
                      class="w-9 h-9 rounded-full object-cover ring-2 ring-slate-700 group-hover/author:ring-indigo-500 transition-all"
                      src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/default-avatar.jpg') }}"
                      alt="{{ $post->author->name }}" />
                    <span
                      class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-slate-800 bg-green-500"></span>
                  </div>
                  <div class="flex flex-col">
                    <span
                      class="text-xs font-semibold text-slate-200 group-hover/author:text-indigo-400 transition-colors">
                      {{ $post->author->name }}
                    </span>
                    <span class="text-[10px] text-slate-500">Content Creator</span>
                  </div>
                </a>

                <a href="/posts/{{ $post->slug }}"
                  class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-700/50 text-slate-400 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                  <svg class="w-4 h-4 transform group-hover:translate-x-0.5 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
          </article>

        @empty
          <div class="col-span-full flex flex-col items-center justify-center py-24 text-center">
            <div class="bg-slate-800/50 p-6 rounded-full mb-6 shadow-inner ring-1 ring-slate-700">
              <svg class="w-12 h-12 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                </path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-white">Postingan/Penulis tidak ditemukan</h3>
            <p class="text-slate-400 mt-2 max-w-sm mx-auto mb-8">Kami tidak dapat menemukan postingan/penulis dengan
              kata kunci
              tersebut.</p>
            <a href="/posts"
              class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-full transition-all shadow-lg shadow-indigo-500/25 hover:-translate-y-0.5">
              Reset Pencarian
            </a>
          </div>
        @endforelse
      </div>

      <div class="mt-16">
        {{ $posts->links() }}
      </div>

    </div>
  </section>

</x-layout>
