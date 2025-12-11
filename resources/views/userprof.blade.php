<x-layout :title="$title">
  <section class="pt-20 min-h-screen bg-slate-900 py-12 relative overflow-hidden">

    <div
      class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-600/20 rounded-full mix-blend-screen filter blur-[128px] opacity-30 pointer-events-none">
    </div>
    <div
      class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-600/20 rounded-full mix-blend-screen filter blur-[128px] opacity-20 pointer-events-none">
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 relative z-10">

      <div class="mb-8">
        <a href="/posts"
          class="inline-flex items-center text-sm font-medium text-slate-400 hover:text-white transition-colors duration-200 group">
          <div
            class="mr-3 flex h-8 w-8 items-center justify-center rounded-full bg-slate-800 border border-slate-700 group-hover:border-indigo-500/50 group-hover:bg-indigo-500/10 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
              stroke="currentColor" class="w-4 h-4 text-slate-300 group-hover:text-indigo-400 transition-colors">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
          </div>
          Kembali ke Semua Post
        </a>
      </div>

      <div
        class="bg-slate-800/40 backdrop-blur-md border border-slate-700/50 rounded-2xl p-8 mb-12 flex flex-col md:flex-row items-center md:items-start gap-8 text-center md:text-left shadow-xl">

        <div class="relative group">
          <div
            class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-cyan-500 rounded-full blur opacity-75 transition duration-200 group-hover:opacity-100">
          </div>
          <img class="relative w-32 h-32 rounded-full object-cover border-4 border-slate-900 shadow-2xl"
            src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/default-avatar.jpg') }}"
            alt="{{ $user->name }}" />
        </div>

        <div class="flex-1 flex flex-col justify-center h-full pt-2">
          <h1 class="text-3xl md:text-4xl font-bold text-white tracking-tight mb-1">
            {{ $user->name }}
          </h1>
          <p class="text-indigo-400 text-lg font-medium mb-4 font-mono">
            {{ '@' . $user->username }}
          </p>

          {{-- ADD: Social Media Links --}}
          <div class="flex items-center gap-3 mb-6">

            {{-- Instagram --}}
            @if ($user->instagram)
              <a href="https://instagram.com/{{ $user->instagram }}" target="_blank"
                class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-800 border border-slate-700 text-slate-400 hover:text-pink-500 hover:border-pink-500/50 hover:bg-pink-500/10 transition-all duration-300"
                title="Instagram">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
              </a>
            @endif

            {{-- LinkedIn --}}
            @if ($user->linkedin)
              <a href="https://www.linkedin.com/in/{{ $user->linkedin }}" target="_blank"
                class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-800 border border-slate-700 text-slate-400 hover:text-blue-500 hover:border-blue-500/50 hover:bg-blue-500/10 transition-all duration-300"
                title="LinkedIn">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                </svg>
              </a>
            @endif

            {{-- GitHub --}}
            @if ($user->github)
              <a href="https://github.com/{{ $user->github }}" target="_blank"
                class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-800 border border-slate-700 text-slate-400 hover:text-white hover:border-slate-500 hover:bg-slate-700 transition-all duration-300"
                title="GitHub">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
              </a>
            @endif
          </div>
          {{-- END: Social Media Links --}}

          <div
            class="inline-flex items-center gap-4 bg-slate-900/50 px-4 py-2 rounded-lg border border-slate-700/50 self-center md:self-start">
            <span class="text-slate-400 text-sm">Post Published</span>
            <span class="w-px h-4 bg-slate-700"></span>
            <span class="text-white font-bold text-lg">{{ $posts->total() }}</span>
          </div>
        </div>
      </div>

      <div class="border-t border-slate-800 pt-10">
        <h3 class="text-xl font-bold text-white mb-8 flex items-center gap-3">
          <span class="w-1 h-6 bg-indigo-500 rounded-full"></span>
          Postingan Terbaru
        </h3>

        <div class="grid gap-6 md:grid-cols-2">
          @forelse ($posts as $post)
            <a href="/posts/{{ $post->slug }}"
              class="group relative block p-6 bg-slate-800/30 hover:bg-slate-800/60 border border-slate-700/50 hover:border-indigo-500/30 rounded-xl transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-indigo-500/10">

              <div class="flex flex-col h-full justify-between">
                <div>
                  <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-medium text-indigo-400 bg-indigo-400/10 px-2 py-1 rounded">
                      {{ $post->category->name ?? 'General' }}
                    </span>
                    <span class="text-xs text-slate-500">
                      {{ $post->created_at->format('d M Y') }}
                    </span>
                  </div>

                  <h4
                    class="text-lg font-bold text-slate-200 group-hover:text-white transition-colors mb-2 line-clamp-2">
                    {{ $post->title }}
                  </h4>

                  <p class="text-sm text-slate-400 line-clamp-2 mb-4">
                    {{ Str::limit(strip_tags($post->body), 100) }}
                  </p>
                </div>

                <div class="flex items-center text-sm text-indigo-400 font-medium group-hover:text-indigo-300 mt-auto">
                  Baca selengkapnya
                  <svg class="w-4 h-4 ml-1 transform transition-transform group-hover:translate-x-1" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 8l4 4m0 0l-4 4m4-4H3" />
                  </svg>
                </div>
              </div>
            </a>
          @empty
            <div
              class="col-span-full py-12 text-center bg-slate-800/30 rounded-xl border border-dashed border-slate-700">
              <svg class="w-12 h-12 text-slate-600 mx-auto mb-3" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                </path>
              </svg>
              <p class="text-slate-400 text-lg">Belum ada postingan.</p>
              <p class="text-slate-500 text-sm">Penulis ini belum menerbitkan artikel apapun.</p>
            </div>
          @endforelse
        </div>

        <div class="mt-10">
          {{ $posts->links('paginations.flowpag') }}
        </div>
      </div>

    </div>
  </section>
</x-layout>
