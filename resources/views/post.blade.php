<x-layout :title="$title">
  <section class="pt-20 min-h-screen bg-slate-900 pb-24 relative overflow-hidden">

    <div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
      <div
        class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] bg-indigo-600/20 rounded-full mix-blend-screen filter blur-[120px] opacity-30">
      </div>
      <div
        class="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] bg-cyan-600/10 rounded-full mix-blend-screen filter blur-[100px] opacity-20">
      </div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 lg:pt-12">

      <div class="mb-8 lg:mb-12">
        <a href="/posts"
          class="group inline-flex items-center text-sm font-medium text-slate-400 hover:text-white transition-colors duration-200">
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

      <header class="text-center mb-10 lg:mb-14">
        <div class="mb-6">
          <a href="/posts?category={{ $post->category->slug }}">
            <span
              class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold tracking-wide uppercase bg-indigo-500/10 text-indigo-300 border border-indigo-500/20 hover:bg-indigo-500/20 transition-colors duration-300">
              {{ $post->category->name }}
            </span>
          </a>
        </div>

        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white tracking-tight leading-tight mb-8">
          {{ $post->title }}
        </h1>

        <div class="flex items-center justify-center gap-4 text-left">
          <a href="/userprof/{{ $post->author->username }}" class="group flex items-center gap-3">
            <div class="relative">
              <img
                class="w-12 h-12 rounded-full object-cover ring-2 ring-slate-700 group-hover:ring-indigo-500 transition-all duration-300"
                src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/default-avatar.jpg') }}"
                alt="{{ $post->author->name }}">
            </div>
            <div>
              <p class="text-sm font-semibold text-white group-hover:text-indigo-400 transition-colors">
                {{ $post->author->name }}
              </p>
              <div class="flex items-center text-xs text-slate-400 gap-2">
                <time datetime="{{ $post->created_at }}">{{ $post->created_at->format('d M Y') }}</time>
                <span class="w-1 h-1 rounded-full bg-slate-600"></span>
                <span>{{ $post->created_at->diffForHumans() }}</span>
              </div>
            </div>
          </a>
        </div>
      </header>

      <article class="relative">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-800/50 to-transparent rounded-3xl -z-10 blur-sm"></div>

        <div
          class="bg-slate-800/30 backdrop-blur-md border border-slate-700/50 rounded-3xl p-6 md:p-10 lg:p-12 shadow-2xl">

          <div
            class="prose prose-lg prose-invert prose-headings:text-white prose-a:text-indigo-400 prose-a:no-underline hover:prose-a:underline prose-strong:text-white prose-blockquote:border-l-indigo-500 prose-blockquote:bg-slate-800/50 prose-blockquote:py-2 prose-blockquote:px-4 prose-blockquote:rounded-r-lg max-w-none text-slate-300 leading-relaxed">
            {!! $post->body !!}
          </div>

          <div class="mt-12 pt-8 border-t border-slate-700/50 flex justify-between items-center">
            <div class="text-slate-500 text-sm italic">
              Terima kasih telah membaca.
            </div>
            <div class="flex gap-2">
              <button
                class="p-2 rounded-full bg-slate-700/50 hover:bg-indigo-600 text-slate-300 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z" />
                </svg>
              </button>
            </div>
          </div>

        </div>
      </article>

    </div>
  </section>

  <x-footer />
</x-layout>
