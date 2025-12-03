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

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 lg:pt-8">

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
            class="break-words prose prose-lg prose-invert prose-headings:text-white prose-a:text-indigo-400 prose-a:no-underline hover:prose-a:underline prose-strong:text-white prose-blockquote:border-l-indigo-500 prose-blockquote:bg-slate-800/50 prose-blockquote:py-2 prose-blockquote:px-4 prose-blockquote:rounded-r-lg max-w-none text-slate-300 leading-relaxed">
            {!! $post->body !!}
          </div>

          <div
            class="mt-10 bg-slate-900/50 border-t border-slate-700/50 p-4 md:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 rounded-xl">
            <h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest">Bagikan</h3>

            <div class="flex flex-wrap justify-center gap-2">
              <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->fullUrl()) }}" target="_blank"
                class="flex items-center gap-2 px-3 py-1.5 bg-green-500/10 text-green-400 border border-green-500/20 rounded-md hover:bg-green-500 hover:text-white transition-all text-xs font-medium group">
                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                  <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                </svg>
                WhatsApp
              </a>

              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                target="_blank"
                class="flex items-center gap-2 px-3 py-1.5 bg-blue-500/10 text-blue-400 border border-blue-500/20 rounded-md hover:bg-blue-500 hover:text-white transition-all text-xs font-medium group">
                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                  <path
                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg>
                Facebook
              </a>

              <button onclick="safeCopyLink()"
                class="flex items-center gap-2 px-3 py-1.5 bg-slate-700/50 text-slate-300 border border-slate-600 rounded-md hover:bg-slate-600 hover:text-white transition-all text-xs font-medium cursor-pointer">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                Copy Link
              </button>
            </div>
          </div>

          <div class="bg-slate-800/30 border border-slate-700/50 rounded-2xl p-6 md:p-8 mt-10">
            <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
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
                <a href="/login" class="inline-block mt-3 text-indigo-400 font-semibold hover:text-indigo-300 underline">
                  Login untuk berkomentar
                </a>
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

          <div class="mt-12 pt-8 border-t border-slate-700/50 flex justify-between items-center">
            <div class="text-slate-500 text-sm italic">
              Terima kasih telah membaca.
            </div>
          </div>

        </div>
      </article>

    </div>
  </section>

  <script>
    function safeCopyLink() {
      const url = window.location.href;

      // Cek apakah navigator.clipboard tersedia dan konteks aman (HTTPS/Localhost)
      if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(url).then(() => {
          alert('Link berhasil disalin!');
        }).catch(err => {
          fallbackCopyTextToClipboard(url);
        });
      } else {
        // Fallback untuk HTTP biasa
        fallbackCopyTextToClipboard(url);
      }
    }

    function fallbackCopyTextToClipboard(text) {
      var textArea = document.createElement("textarea");
      textArea.value = text;

      // Buat elemen tidak terlihat agar tidak mengganggu UI
      textArea.style.top = "0";
      textArea.style.left = "0";
      textArea.style.position = "fixed";

      document.body.appendChild(textArea);
      textArea.focus();
      textArea.select();

      try {
        var successful = document.execCommand('copy');
        if (successful) {
          alert('Link berhasil disalin!');
        } else {
          alert('Gagal menyalin link.');
        }
      } catch (err) {
        console.error('Fallback: Oops, unable to copy', err);
        alert('Browser tidak mendukung copy otomatis, silakan copy dari address bar.');
      }

      document.body.removeChild(textArea);
    }
  </script>

</x-layout>
