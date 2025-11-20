<main class="min-h-screen bg-slate-900 py-12 relative overflow-hidden antialiased">

  <div
    class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-3xl h-[500px] bg-indigo-600/10 rounded-full mix-blend-screen filter blur-[100px] opacity-20 pointer-events-none">
  </div>

  <div class="relative z-10 px-4 mx-auto max-w-4xl">

    <div class="mb-8">
      <a href="/dashboard"
        class="group inline-flex items-center text-sm font-medium text-slate-400 hover:text-white transition-colors duration-200">
        <div
          class="mr-3 flex h-8 w-8 items-center justify-center rounded-full bg-slate-800 border border-slate-700 group-hover:border-indigo-500/50 group-hover:bg-indigo-500/10 transition-all">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
            class="w-4 h-4 text-slate-300 group-hover:text-indigo-400 transition-colors">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
          </svg>
        </div>
        Kembali ke Dashboard
      </a>
    </div>

    <article class="bg-slate-800/50 backdrop-blur-md rounded-2xl border border-slate-700/60 shadow-2xl overflow-hidden">

      <div class="p-8 border-b border-slate-700/50 bg-slate-900/30">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">

          <div class="flex items-center gap-4">
            <img class="w-12 h-12 rounded-full border-2 border-slate-700 object-cover"
              src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/default-avatar.jpg') }}"
              alt="{{ $post->author->name }}">
            <div>
              <h4 class="text-white font-bold text-base">{{ $post->author->name }}</h4>
              <div class="flex items-center gap-2 mt-1">
                <span class="text-xs text-slate-400">{{ $post->created_at->format('d M Y') }}</span>
                <span class="w-1 h-1 rounded-full bg-slate-600"></span>
                <span
                  class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-indigo-500/10 text-indigo-300 border border-indigo-500/20">
                  {{ $post->category->name }}
                </span>
              </div>
            </div>
          </div>

          <div class="flex items-center gap-3">
            <a href="/dashboard/{{ $post->slug }}/edit"
              class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-all shadow-lg shadow-indigo-500/20 hover:-translate-y-0.5">
              <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                </path>
              </svg>
              Edit
            </a>

            <button type="button" data-modal-target="deleteModal-{{ $post->id }}"
              data-modal-toggle="deleteModal-{{ $post->id }}"
              class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-400 bg-red-900/20 hover:bg-red-900/40 border border-red-900/50 rounded-lg transition-all hover:-translate-y-0.5">
              <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                </path>
              </svg>
              Delete
            </button>
          </div>

        </div>

        <h1 class="mt-8 text-3xl md:text-4xl font-extrabold text-white leading-tight tracking-tight">
          {{ $post->title }}
        </h1>
      </div>

      <div class="p-8 md:p-10">
        <div
          class="prose prose-lg prose-invert max-w-none prose-headings:text-white prose-p:text-slate-300 prose-a:text-indigo-400 prose-blockquote:border-l-indigo-500 prose-blockquote:bg-slate-800/50 prose-blockquote:py-1 prose-blockquote:px-4 prose-img:rounded-xl">
          {!! $post->body !!}
        </div>
      </div>

    </article>
  </div>

  <div id="deleteModal-{{ $post->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full backdrop-blur-sm bg-black/30">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
      <div class="relative p-4 text-center bg-slate-800 rounded-2xl shadow-2xl border border-slate-700 sm:p-5">
        <button type="button"
          class="text-slate-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-slate-700 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
          data-modal-toggle="deleteModal-{{ $post->id }}">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>

        <div class="w-12 h-12 rounded-full bg-red-900/30 p-2 flex items-center justify-center mx-auto mb-4">
          <svg class="text-red-500 w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
            </path>
          </svg>
        </div>

        <h3 class="mb-1 text-lg font-bold text-white">Konfirmasi Penghapusan</h3>
        <p class="mb-6 text-slate-400 text-sm">Apakah Anda yakin ingin menghapus postingan "<span
            class="text-white font-medium">{{ Str::limit($post->title, 25) }}</span>"?</p>

        <form action="/dashboard/{{ $post->slug }}" method="POST"
          class="flex justify-center items-center space-x-3">
          @csrf
          @method('DELETE')
          <button data-modal-toggle="deleteModal-{{ $post->id }}" type="button"
            class="py-2.5 px-5 text-sm font-medium text-slate-300 bg-slate-700 rounded-lg border border-slate-600 hover:bg-slate-600 hover:text-white transition-colors">
            Batal
          </button>
          <button type="submit"
            class="py-2.5 px-5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-900 shadow-lg shadow-red-600/20 transition-colors">
            Ya, Hapus
          </button>
        </form>
      </div>
    </div>
  </div>

</main>
