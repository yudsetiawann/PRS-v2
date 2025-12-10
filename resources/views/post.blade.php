<x-layout :title="$post->title">
  {{-- Section Utama --}}
  <section class="pt-16 min-h-screen bg-slate-900 pb-24 relative overflow-hidden">

    {{-- Background Effects --}}
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
      <div
        class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] bg-indigo-600/20 rounded-full mix-blend-screen filter blur-[120px] opacity-30">
      </div>
      <div
        class="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] bg-cyan-600/10 rounded-full mix-blend-screen filter blur-[100px] opacity-20">
      </div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 lg:pt-8">

      {{-- Navigasi Kembali (Ke Blog Utama) --}}
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
          Kembali ke Blog
        </a>
      </div>

      {{-- Header Artikel --}}
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

              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                target="_blank"
                class="flex items-center gap-2 px-3 py-1.5 bg-blue-500/10 text-blue-400 border border-blue-500/20 rounded-md hover:bg-blue-500 hover:text-white transition-all text-xs font-medium group">
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

          {{-- Footer Artikel & Report Post --}}
          <div class="mt-12 pt-8 border-t border-slate-700/50 flex flex-wrap justify-between items-center gap-4">
            <div class="text-slate-500 text-sm italic">
              Terima kasih telah membaca.
            </div>

            {{-- TOMBOL REPORT POSTINGAN --}}
            @auth
              <button onclick="openReportModal('post', {{ $post->id }})"
                class="text-slate-500 hover:text-red-500 text-xs flex items-center gap-1 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 21v-8a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5-5 5H5a2 2 0 01-2 2z" />
                </svg>
                Lapor Postingan
              </button>
            @endauth
          </div>

          {{-- KOLOM KOMENTAR --}}
          <div class="bg-slate-800/30 border border-slate-700/50 rounded-2xl p-6 md:p-8 mt-12">
            <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
              <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                </path>
              </svg>
              Komentar ({{ $post->allComments->count() }})
            </h3>

            @auth
              <form action="/posts/{{ $post->slug }}/comments" method="POST" class="mb-10">
                @csrf
                <div class="mb-4">
                  <label for="body" class="sr-only">Tulis komentar</label>
                  <textarea name="body" rows="3" required
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

            <div class="space-y-8">
              @forelse($post->comments as $comment)

                <div x-data="{ openReply: false, isEditing: false, showReplies: true }" class="group">
                  <div class="flex gap-4">
                    <div class="flex-shrink-0">
                      <img
                        src="{{ $comment->user->avatar ? asset('storage/' . $comment->user->avatar) : asset('img/default-avatar.jpg') }}"
                        class="w-10 h-10 rounded-full object-cover border border-slate-700">
                    </div>

                    <div class="flex-grow">
                      <div x-show="!isEditing">
                        <div
                          class="bg-slate-900/80 border border-slate-700/50 rounded-2xl rounded-tl-none p-4 relative group/edit">

                          <div class="flex justify-between items-start mb-2">
                            <h5 class="text-sm font-bold text-white">{{ $comment->user->name }}</h5>
                            <span class="text-xs text-slate-500">{{ $comment->created_at->diffForHumans() }}</span>
                          </div>

                          <p class="text-slate-300 text-sm leading-relaxed">{{ $comment->body }}</p>

                        </div>

                        <div class="flex items-center gap-4 mt-2 ml-2 flex-wrap">
                          @auth
                            <button @click="openReply = !openReply"
                              class="text-xs text-indigo-400 hover:text-indigo-300 font-medium flex items-center gap-1">
                              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                              </svg>
                              Balas
                            </button>

                            {{-- TOMBOL REPORT KOMENTAR UTAMA --}}
                            <button onclick="openReportModal('comment', {{ $comment->id }})"
                              class="text-slate-500 hover:text-red-500 text-xs flex items-center gap-1 transition-colors"
                              title="Lapor Komentar">
                              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 21v-8a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5-5 5H5a2 2 0 01-2 2z" />
                              </svg>
                              Lapor
                            </button>
                          @endauth

                          @if (Auth::id() == $comment->user_id)
                            <div class="flex items-center gap-3 border-l border-slate-700 pl-4">
                              <button @click="isEditing = true"
                                class="text-xs text-slate-500 hover:text-white font-medium flex items-center gap-1 transition-colors"
                                title="Edit">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                  </path>
                                </svg>
                                Edit
                              </button>

                              <form action="/comments/{{ $comment->id }}" method="POST"
                                onsubmit="return confirm('Hapus komentar ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                  class="text-xs text-slate-500 hover:text-red-400 font-medium flex items-center gap-1 transition-colors"
                                  title="Hapus">
                                  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                  </svg>
                                  Hapus
                                </button>
                              </form>
                            </div>
                          @endif
                          @if ($comment->replies->count() > 0)
                            <button @click="showReplies = !showReplies"
                              class="text-xs text-slate-500 hover:text-white font-medium flex items-center gap-1 ml-auto">
                              <svg x-show="!showReplies" class="w-3 h-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"></path>
                              </svg>
                              <svg x-show="showReplies" class="w-3 h-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 15l7-7 7 7"></path>
                              </svg>
                              <span
                                x-text="showReplies ? 'Sembunyikan Balasan' : 'Lihat {{ $comment->replies->count() }} Balasan'"></span>
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
                              class="px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-lg transition-colors">Update</button>
                            <button type="button" @click="isEditing = false"
                              class="px-3 py-1.5 bg-transparent border border-slate-600 text-slate-400 hover:text-white text-xs font-bold rounded-lg transition-colors">Batal</button>
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
                                class="px-4 py-2 bg-indigo-600 text-white text-xs rounded-lg hover:bg-indigo-700">Kirim</button>
                            </div>
                          </form>
                        </div>
                      @endauth
                    </div>
                  </div>

                  @if ($comment->replies->count() > 0)
                    <div x-show="showReplies" x-transition
                      class="ml-14 mt-4 space-y-4 border-l-2 border-slate-800 pl-4">
                      @foreach ($comment->replies as $reply)
                        <div x-data="{ isEditingChild: false }" class="flex gap-3 group/child">
                          <div class="flex-shrink-0">
                            <img
                              src="{{ $reply->user->avatar ? asset('storage/' . $reply->user->avatar) : asset('img/default-avatar.jpg') }}"
                              class="w-8 h-8 rounded-full object-cover border border-slate-700">
                          </div>
                          <div class="flex-grow">

                            <div x-show="!isEditingChild">
                              <div
                                class="group/child-edit bg-slate-800/50 border border-slate-700/30 rounded-xl rounded-tl-none p-3 relative">
                                <div class="flex justify-between items-start mb-1">
                                  <h5 class="text-xs font-bold text-white">{{ $reply->user->name }}</h5>
                                  <span
                                    class="text-[10px] text-slate-500">{{ $reply->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-slate-400 text-xs leading-relaxed">{{ $reply->body }}</p>
                              </div>

                              <div class="flex items-center gap-3 mt-1 ml-2">
                                {{-- TOMBOL REPORT BALASAN --}}
                                @auth
                                  <button onclick="openReportModal('comment', {{ $reply->id }})"
                                    class="text-[10px] text-slate-500 hover:text-red-500 font-medium flex items-center gap-1 transition-colors">
                                    Lapor
                                  </button>
                                @endauth

                                @if (Auth::id() == $reply->user_id)
                                  <button @click="isEditingChild = true"
                                    class="text-[10px] text-slate-500 hover:text-white font-medium flex items-center gap-1 transition-colors">
                                    Edit
                                  </button>

                                  <form action="/comments/{{ $reply->id }}" method="POST"
                                    onsubmit="return confirm('Hapus balasan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                      class="text-[10px] text-slate-500 hover:text-red-400 font-medium flex items-center gap-1 transition-colors">
                                      Hapus
                                    </button>
                                  </form>
                                @endif
                              </div>
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

        </div>
      </article>

    </div>
  </section>

  {{-- MODAL REPORT --}}
  <div id="reportModal"
    class="hidden fixed inset-0 z-[9999] bg-black/70 flex items-center justify-center backdrop-blur-sm transition-opacity duration-300 px-4">
    <div class="bg-slate-800 p-6 rounded-xl w-full max-w-md border border-slate-700 shadow-2xl relative">
      {{-- Tombol Close X --}}
      <button onclick="document.getElementById('reportModal').classList.add('hidden')"
        class="absolute top-4 right-4 text-slate-400 hover:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd" />
        </svg>
      </button>

      <h3 class="text-white font-bold text-lg mb-1">Laporkan Konten</h3>
      <p class="text-slate-400 text-xs mb-4">Bantu kami menjaga komunitas tetap aman.</p>

      <form action="{{ route('report.store') }}" method="POST">
        @csrf
        <input type="hidden" name="type" id="reportType">
        <input type="hidden" name="id" id="reportId">

        <label class="text-slate-300 text-sm font-medium block mb-2">Alasan Pelaporan:</label>
        <textarea name="reason"
          class="w-full bg-slate-900 border border-slate-600 text-slate-200 rounded-lg p-3 text-sm mb-4 focus:ring-2 focus:ring-red-500 focus:border-transparent placeholder-slate-600"
          rows="4" required placeholder="Contoh: Mengandung ujaran kebencian, spam, atau informasi palsu..."></textarea>

        <div class="flex justify-end gap-3">
          <button type="button" onclick="document.getElementById('reportModal').classList.add('hidden')"
            class="px-4 py-2 border border-slate-600 text-slate-300 text-sm rounded-lg hover:bg-slate-700 transition-colors">Batal</button>
          <button type="submit"
            class="px-4 py-2 bg-red-600 text-white font-medium rounded-lg text-sm hover:bg-red-700 shadow-lg shadow-red-500/20 transition-colors">Kirim
            Laporan</button>
        </div>
      </form>
    </div>
  </div>

  {{-- Script Copy Link & Report Modal --}}
  <script>
    function openReportModal(type, id) {
      document.getElementById('reportType').value = type;
      document.getElementById('reportId').value = id;
      document.getElementById('reportModal').classList.remove('hidden');
    }

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
</x-layout>
