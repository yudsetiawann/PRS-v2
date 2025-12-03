<x-layout :title="$post->title">
  <main class="min-h-screen bg-slate-900 py-12 relative overflow-hidden antialiased">

    <div
      class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-3xl h-[500px] bg-indigo-600/10 rounded-full mix-blend-screen filter blur-[100px] opacity-20 pointer-events-none">
    </div>

    <div class="relative z-10 px-4 mx-auto max-w-4xl">

      <div class="mb-8">
        <a href="/posts"
          class="group inline-flex items-center text-sm font-medium text-slate-400 hover:text-white transition-colors duration-200">
          <div
            class="mr-3 flex h-8 w-8 items-center justify-center rounded-full bg-slate-800 border border-slate-700 group-hover:border-indigo-500/50 group-hover:bg-indigo-500/10 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
              stroke="currentColor" class="w-4 h-4 text-slate-300 group-hover:text-indigo-400 transition-colors">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
          </div>
          Kembali ke Blog
        </a>
      </div>

      <article
        class="bg-slate-800/50 backdrop-blur-md rounded-2xl border border-slate-700/60 shadow-2xl overflow-hidden mb-12">
        <div class="p-8 border-b border-slate-700/50 bg-slate-900/30">
          <div class="flex items-center gap-4 mb-6">
            <img class="w-12 h-12 rounded-full border-2 border-slate-700 object-cover"
              src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/default-avatar.jpg') }}"
              alt="{{ $post->author->name }}">
            <div>
              <h4 class="text-white font-bold text-base hover:text-indigo-400 transition-colors">
                <a href="/userprof/{{ $post->author->username }}">{{ $post->author->name }}</a>
              </h4>
              <div class="flex items-center gap-2 mt-1">
                <span class="text-xs text-slate-400">{{ $post->created_at->format('d M Y') }}</span>
                <span class="w-1 h-1 rounded-full bg-slate-600"></span>
                <a href="/posts?category={{ $post->category->slug }}">
                  <span
                    class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-indigo-500/10 text-indigo-300 border border-indigo-500/20 hover:bg-indigo-500/20 transition-colors">
                    {{ $post->category->name }}
                  </span>
                </a>
              </div>
            </div>
          </div>

          <h1 class="text-3xl md:text-4xl font-extrabold text-white leading-tight tracking-tight">
            {{ $post->title }}
          </h1>
        </div>

        <div class="p-8 md:p-10">
          <div
            class="prose prose-lg text-slate-300 prose-invert max-w-none prose-headings:text-white prose-p:text-slate-300 prose-a:text-indigo-400 prose-blockquote:border-l-indigo-500 prose-blockquote:bg-slate-800/50 prose-blockquote:py-1 prose-blockquote:px-4 prose-img:rounded-xl">
            {!! $post->body !!}
          </div>
        </div>

        <div class="bg-slate-900/50 border-t border-slate-700/50 p-6 md:px-10">
          <h3 class="text-sm font-semibold text-slate-400 uppercase tracking-wider mb-4">Bagikan Artikel Ini</h3>
          <div class="flex flex-wrap gap-3">
            <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->fullUrl()) }}" target="_blank"
              class="flex items-center px-4 py-2 bg-green-600/10 text-green-500 border border-green-600/20 rounded-lg hover:bg-green-600 hover:text-white transition-all">
              <i class="fa-brands fa-whatsapp mr-2"></i> WhatsApp
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"
              class="flex items-center px-4 py-2 bg-blue-600/10 text-blue-500 border border-blue-600/20 rounded-lg hover:bg-blue-600 hover:text-white transition-all">
              <i class="fa-brands fa-facebook mr-2"></i> Facebook
            </a>
            <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link berhasil disalin!');"
              class="flex items-center px-4 py-2 bg-slate-700/50 text-slate-300 border border-slate-600 rounded-lg hover:bg-slate-600 hover:text-white transition-all">
              <i class="fa-regular fa-copy mr-2"></i> Copy Link
            </button>
          </div>
        </div>
      </article>

      <div class="bg-slate-800/30 border border-slate-700/50 rounded-2xl p-6 md:p-8">
        <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
          <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
          </svg>
          Komentar ({{ $post->comments->count() }})
        </h3>

        @auth
          <form action="/posts/{{ $post->slug }}/comments" method="POST" class="mb-10">
            @csrf
            <div class="mb-4">
              <label for="body" class="sr-only">Tulis komentar</label>
              <textarea name="body" id="body" rows="3" required
                class="w-full bg-slate-900 border border-slate-700 rounded-xl text-slate-200 p-4 focus:ring-2 focus:ring-indigo-500 focus:border-transparent placeholder-slate-500 transition-all"
                placeholder="Apa pendapatmu tentang artikel ini?"></textarea>
            </div>
            <div class="flex justify-end">
              <button type="submit"
                class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors shadow-lg shadow-indigo-500/20">
                Kirim Komentar
              </button>
            </div>
          </form>
        @else
          <div class="mb-10 p-6 bg-slate-900/50 rounded-xl border border-slate-700 text-center">
            <p class="text-slate-400">Ingin bergabung dalam diskusi?</p>
            <a href="/login"
              class="inline-block mt-3 text-indigo-400 font-semibold hover:text-indigo-300 underline">Login untuk
              berkomentar</a>
          </div>
        @endauth

        <div class="space-y-6">
          @forelse($post->comments as $comment)
            <div class="flex gap-4 group">
              <div class="flex-shrink-0">
                <img
                  src="{{ $comment->user->avatar ? asset('storage/' . $comment->user->avatar) : asset('img/default-avatar.jpg') }}"
                  class="w-10 h-10 rounded-full object-cover border border-slate-700">
              </div>
              <div class="flex-grow">
                <div class="bg-slate-900/80 border border-slate-700/50 rounded-2xl rounded-tl-none p-4">
                  <div class="flex justify-between items-start mb-2">
                    <h5 class="text-sm font-bold text-white">{{ $comment->user->name }}</h5>
                    <span class="text-xs text-slate-500">{{ $comment->created_at->diffForHumans() }}</span>
                  </div>
                  <p class="text-slate-300 text-sm leading-relaxed">{{ $comment->body }}</p>
                </div>
              </div>
            </div>
          @empty
            <p class="text-center text-slate-500 py-4 italic">Belum ada komentar. Jadilah yang pertama!</p>
          @endforelse
        </div>
      </div>

    </div>
  </main>
</x-layout>
