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
            class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-cyan-500 rounded-full opacity-50 blur opacity-75 transition duration-200 group-hover:opacity-100">
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

          <div
            class="inline-flex items-center gap-4 bg-slate-900/50 px-4 py-2 rounded-lg border border-slate-700/50 self-center md:self-start">
            <span class="text-slate-400 text-sm">Published Articles</span>
            <span class="w-px h-4 bg-slate-700"></span>
            <span class="text-white font-bold text-lg">{{ $posts->count() }}</span>
          </div>
        </div>
      </div>

      <div class="border-t border-slate-800 pt-10">
        <h3 class="text-xl font-bold text-white mb-8 flex items-center gap-3">
          <span class="w-1 h-6 bg-indigo-500 rounded-full"></span>
          Artikel Terbaru
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

  <x-footer />
</x-layout>
