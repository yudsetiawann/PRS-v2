{{-- HAPUS <x-layout> dan </x-layout>. Gunakan div biasa sebagai pembungkus utama --}}

<section class="pt-12 min-h-screen bg-slate-900 pb-24 relative overflow-hidden rounded-xl shadow-2xl">

  {{-- Background Effects --}}
  <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
    <div
      class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] bg-indigo-600/20 rounded-full mix-blend-screen filter blur-[120px] opacity-30">
    </div>
    <div
      class="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] bg-cyan-600/10 rounded-full mix-blend-screen filter blur-[100px] opacity-20">
    </div>
  </div>

  <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-12">

    {{-- Navigasi Kembali --}}
    <div class="mb-8 lg:mb-12">
      <a href="/dashboard"
        class="group inline-flex items-center text-sm font-medium text-slate-400 hover:text-white transition-colors duration-200">
        <div
          class="mr-3 flex h-8 w-8 items-center justify-center rounded-full bg-slate-800 border border-slate-700 group-hover:border-indigo-500/50 group-hover:bg-indigo-500/10 transition-all">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" class="w-4 h-4 text-slate-300 group-hover:text-indigo-400 transition-colors">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
          </svg>
        </div>
        Kembali ke Dashboard
      </a>
    </div>

    {{-- Header Artikel --}}
    <header class="text-center mb-10 lg:mb-14">
      <div class="mb-6">
        <span
          class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold tracking-wide uppercase bg-indigo-500/10 text-indigo-300 border border-indigo-500/20 hover:bg-indigo-500/20 transition-colors duration-300">
          {{ $post->category->name }}
        </span>
      </div>

      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white tracking-tight leading-tight mb-8">
        {{ $post->title }}
      </h1>

      <div class="flex items-center justify-center gap-4 text-left">
        <div class="group flex items-center gap-3">
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
        </div>
      </div>
    </header>

    <article class="relative">
      <div class="absolute inset-0 bg-gradient-to-b from-slate-800/50 to-transparent rounded-3xl -z-10 blur-sm">
      </div>

      <div
        class="bg-slate-800/30 backdrop-blur-md border border-slate-700/50 rounded-3xl p-6 md:p-10 lg:p-12 shadow-2xl">

        {{-- Isi Artikel --}}
        <div
          class="break-words prose prose-lg prose-invert prose-headings:text-white prose-a:text-indigo-400 prose-a:no-underline hover:prose-a:underline prose-strong:text-white prose-blockquote:border-l-indigo-500 prose-blockquote:bg-slate-800/50 prose-blockquote:py-2 prose-blockquote:px-4 prose-blockquote:rounded-r-lg max-w-none text-slate-300 leading-relaxed">
          {!! $post->body !!}
        </div>

        {{-- Bagian Share --}}
        <div
          class="mt-10 bg-slate-900/50 border-t border-slate-700/50 p-4 md:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 rounded-xl">
          <h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest">Bagikan</h3>

          <div class="flex flex-wrap justify-center gap-2">
            <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->fullUrl()) }}" target="_blank"
              class="flex items-center gap-2 px-3 py-1.5 bg-green-500/10 text-green-400 border border-green-500/20 rounded-md hover:bg-green-500 hover:text-white transition-all text-xs font-medium group">
              WhatsApp
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

        {{-- KOLOM KOMENTAR --}}
        <div class="bg-slate-800/30 border border-slate-700/50 rounded-2xl p-6 md:p-8 mt-10">
          <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
            Komentar ({{ $post->comments->count() }})
          </h3>

          {{-- Form Komentar Utama --}}
          <form action="/posts/{{ $post->slug }}/comments" method="POST" class="mb-10">
            @csrf
            <div class="mb-4">
              <label for="body" class="sr-only">Tulis komentar</label>
              <textarea name="body" id="body" rows="3" required
                class="w-full bg-slate-900 border border-slate-700 rounded-xl text-slate-200 p-4 focus:ring-2 focus:ring-indigo-500 focus:border-transparent placeholder-slate-500 transition-all"
                placeholder="Tulis komentar sebagai Admin..."></textarea>
            </div>
            <div class="flex justify-end">
              <button type="submit"
                class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors shadow-lg shadow-indigo-500/20">
                Kirim Komentar
              </button>
            </div>
          </form>

          {{-- List Komentar --}}
          <div class="space-y-6">
            @forelse($post->comments as $comment)

              <div x-data="{ openReply: false, isEditing: false }" class="group">
                <div class="flex gap-4">
                  <div class="flex-shrink-0">
                    <img
                      src="{{ $comment->user->avatar ? asset('storage/' . $comment->user->avatar) : asset('img/default-avatar.jpg') }}"
                      class="w-10 h-10 rounded-full object-cover border border-slate-700">
                  </div>

                  <div class="flex-grow">
                    <div x-show="!isEditing">
                      <div class="bg-slate-900/80 border border-slate-700/50 rounded-2xl rounded-tl-none p-4">

                        <div class="flex justify-between items-start mb-2">
                          <h5 class="text-sm font-bold text-white">{{ $comment->user->name }}</h5>
                          <span class="text-xs text-slate-500">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>

                        <p class="text-slate-300 text-sm leading-relaxed">{{ $comment->body }}</p>
                      </div>

                      <div class="flex items-center gap-4 mt-2 ml-2">

                        @auth
                          <button @click="openReply = !openReply"
                            class="text-xs text-indigo-400 hover:text-indigo-300 font-medium flex items-center gap-1 transition-colors">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                            </svg>
                            Balas
                          </button>
                        @endauth

                        @if (Auth::id() === $comment->user_id)
                          <button @click="isEditing = true"
                            class="text-xs text-slate-300 hover:text-white font-medium flex items-center gap-1 transition-colors">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                              </path>
                            </svg>
                            Edit
                          </button>
                        @endif
                      </div>

                    </div>

                    <div x-show="isEditing" style="display: none;" class="mt-1">
                      <form action="/comments/{{ $comment->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <textarea name="body" rows="3"
                          class="w-full bg-slate-900 border border-slate-600 rounded-xl text-slate-200 p-3 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">{{ $comment->body }}</textarea>

                        <div class="flex items-center gap-2 mt-2">
                          <button type="submit"
                            class="px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-lg transition-colors">
                            Update
                          </button>
                          <button type="button" @click="isEditing = false"
                            class="px-3 py-1.5 bg-transparent border border-slate-600 text-slate-400 hover:text-white text-xs font-bold rounded-lg transition-colors">
                            Batal
                          </button>
                        </div>
                      </form>
                    </div>

                    @auth
                      <div x-show="openReply" class="mt-4 ml-2" x-transition style="display: none;">
                        <form action="/posts/{{ $post->slug }}/comments" method="POST">
                          @csrf
                          <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                          <div class="flex gap-2">
                            <input type="text" name="body" required
                              class="w-full bg-slate-900 border border-slate-700 rounded-lg text-sm text-white px-4 py-2 focus:ring-1 focus:ring-indigo-500 placeholder-slate-500"
                              placeholder="Balas komentar {{ $comment->user->name }}...">
                            <button type="submit"
                              class="px-4 py-2 bg-indigo-600 text-white text-xs rounded-lg hover:bg-indigo-700">
                              Kirim
                            </button>
                          </div>
                        </form>
                      </div>
                    @endauth
                  </div>
                </div>

                @if ($comment->replies->count() > 0)
                  <div class="ml-14 mt-4 space-y-4 border-l-2 border-slate-800 pl-4">
                    @foreach ($comment->replies as $reply)
                      <div x-data="{ isEditingChild: false }" class="flex gap-3">
                        <div class="flex-shrink-0">
                          <img
                            src="{{ $reply->user->avatar ? asset('storage/' . $reply->user->avatar) : asset('img/default-avatar.jpg') }}"
                            class="w-8 h-8 rounded-full object-cover border border-slate-700">
                        </div>
                        <div class="flex-grow">

                          <div x-show="!isEditingChild">
                              <div class="bg-slate-800/50 border border-slate-700/30 rounded-xl rounded-tl-none p-3">
                              <div class="flex justify-between items-start mb-1">
                                <h5 class="text-xs font-bold text-white">{{ $reply->user->name }}</h5>
                                <span class="text-[10px] text-slate-500">{{ $reply->created_at->diffForHumans() }}</span>
                              </div>
                              <p class="text-slate-400 text-xs leading-relaxed">{{ $reply->body }}</p>
                            </div>

                            @if (Auth::id() == $reply->user_id)
                              <div class="mt-1 ml-1">
                                  <button @click="isEditingChild = true"
                                    class="text-[10px] text-slate-300 hover:text-white flex items-center gap-1 transition-colors">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                      </path>
                                    </svg>
                                    Edit
                                  </button>
                              </div>
                            @endif
                          </div>

                          <div x-show="isEditingChild" style="display: none;" class="mt-2">
                            <form action="/comments/{{ $reply->id }}" method="POST">
                              @csrf
                              @method('PATCH')
                              <textarea name="body" rows="2"
                                class="w-full bg-slate-900 border border-slate-600 rounded-lg text-slate-200 p-2 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-transparent">{{ $reply->body }}</textarea>
                              <div class="flex gap-2 mt-2">
                                <button type="submit"
                                  class="px-2 py-1 bg-indigo-600 text-white text-[10px] font-bold rounded hover:bg-indigo-700">Simpan</button>
                                <button type="button" @click="isEditingChild = false"
                                  class="px-2 py-1 border border-slate-600 text-slate-400 text-[10px] font-bold rounded hover:text-white">Batal</button>
                              </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    @endforeach
                  </div>
                @endif
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

{{-- Script Copy Link --}}
<script>
  function safeCopyLink() {
    const url = window.location.href;
    if (navigator.clipboard && window.isSecureContext) {
      navigator.clipboard.writeText(url).then(() => {
        alert('Link berhasil disalin!');
      }).catch(err => {
        fallbackCopyTextToClipboard(url);
      });
    } else {
      fallbackCopyTextToClipboard(url);
    }
  }

  function fallbackCopyTextToClipboard(text) {
    var textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.top = "0";
    textArea.style.left = "0";
    textArea.style.position = "fixed";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    try {
      var successful = document.execCommand('copy');
      if (successful) alert('Link berhasil disalin!');
      else alert('Gagal menyalin link.');
    } catch (err) {
      console.error('Fallback: Oops, unable to copy', err);
      alert('Browser tidak mendukung copy otomatis.');
    }
    document.body.removeChild(textArea);
  }
</script>
