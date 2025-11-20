@if (Session::has('success'))
  <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
    x-transition:enter="transform ease-out duration-300 transition"
    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed top-24 right-5 z-50 flex items-center w-full max-w-xs p-4 mb-4 text-slate-300 bg-slate-800 rounded-xl shadow-2xl border border-slate-700 border-l-4 border-l-green-500"
    role="alert">

    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-400 bg-green-900/30 rounded-lg">
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
      </svg>
    </div>
    <div class="ml-3 text-sm font-medium">{{ Session::get('success') }}</div>
    <button type="button" @click="show = false"
      class="ml-auto -mx-1.5 -my-1.5 bg-slate-800 text-slate-400 hover:text-white rounded-lg focus:ring-2 focus:ring-slate-600 p-1.5 hover:bg-slate-700 inline-flex items-center justify-center h-8 w-8">
      <span class="sr-only">Close</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
    </button>
  </div>
@endif

<section class="p-4 sm:p-6 antialiased min-h-screen bg-slate-900">
  <div class="mx-auto max-w-screen-xl px-4 lg:px-12">

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
      <div>
        <h2 class="text-3xl font-bold text-white tracking-tight">Dashboard Posts</h2>
        <p class="text-slate-400 text-sm mt-1">Manage postingan oleh: <span
            class="text-indigo-400 font-semibold">{{ Auth::user()->name }}</span></p>
      </div>

      <a href="/dashboard/create" id="createProductModalButton1"
        class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300/50 rounded-lg transition-all shadow-lg shadow-indigo-500/20 hover:-translate-y-0.5">
        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        Buat Post Baru
      </a>
    </div>

    <div
      class="bg-slate-800/50 backdrop-blur-sm relative shadow-xl sm:rounded-2xl border border-slate-700/60 overflow-hidden">

      <div
        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-5 border-b border-slate-700/50">
        <div class="w-full md:w-1/2">
          <form class="flex items-center">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-slate-400" fill="currentColor" viewbox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd" />
                </svg>
              </div>
              <input type="text" id="simple-search" name='keyword'
                class="bg-slate-900 border border-slate-700 text-white text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5 placeholder-slate-500 transition-colors"
                placeholder="Cari judul post...">
            </div>
          </form>
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-slate-400">
          <thead class="text-xs text-slate-300 uppercase bg-slate-900/50 border-b border-slate-700">
            <tr>
              <th scope="col" class="px-6 py-4 font-semibold">No</th>
              <th scope="col" class="px-6 py-4 font-semibold">Judul Post</th>
              <th scope="col" class="px-6 py-4 font-semibold">Kategori</th>
              <th scope="col" class="px-6 py-4 font-semibold">Tanggal</th>
              <th scope="col" class="px-6 py-4 font-semibold text-right">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-700">
            @foreach ($posts as $post)
              <tr class="hover:bg-slate-700/30 transition-colors duration-200">
                <td class="px-6 py-4 font-medium text-white whitespace-nowrap">
                  {{ $loop->iteration }}
                </td>
                <td class="px-6 py-4 font-medium text-white">
                  {{ Str::limit($post->title, 40) }}
                </td>
                <td class="px-6 py-4">
                  <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-500/10 text-indigo-300 border border-indigo-500/20">
                    {{ $post->category->name }}
                  </span>
                </td>
                <td class="px-6 py-4">
                  {{ $post->created_at->format('d M Y') }}
                  <span class="block text-xs text-slate-500 mt-0.5">{{ $post->created_at->diffForHumans() }}</span>
                </td>
                <td class="px-6 py-4 text-right">
                  <button id="post-{{ $post->id }}-dropdown-button"
                    data-dropdown-toggle="post-{{ $post->id }}-dropdown"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-slate-400 bg-transparent rounded-lg hover:bg-slate-700 focus:outline-none focus:text-white"
                    type="button">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                    </svg>
                  </button>

                  <div id="post-{{ $post->id }}-dropdown"
                    class="hidden z-50 w-44 bg-slate-800 rounded-xl divide-y divide-slate-700 shadow-2xl border border-slate-700 ring-1 ring-black/5">
                    <ul class="py-1 text-sm text-slate-300"
                      aria-labelledby="post-{{ $post->id }}-dropdown-button">
                      <li>
                        <a href="/dashboard/{{ $post->slug }}"
                          class="flex w-full items-center py-2.5 px-4 hover:bg-slate-700 hover:text-white transition-colors">
                          <svg class="w-4 h-4 mr-3 text-slate-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                          </svg>
                          Lihat
                        </a>
                      </li>
                      <li>
                        <a href="/dashboard/{{ $post->slug }}/edit"
                          class="flex w-full items-center py-2.5 px-4 hover:bg-slate-700 hover:text-white transition-colors">
                          <svg class="w-4 h-4 mr-3 text-slate-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                          </svg>
                          Edit
                        </a>
                      </li>
                      <li>
                        <button type="button" data-modal-target="deleteModal-{{ $post->id }}"
                          data-modal-toggle="deleteModal-{{ $post->id }}"
                          class="flex w-full items-center py-2.5 px-4 text-red-400 hover:bg-red-900/20 hover:text-red-300 transition-colors">
                          <svg class="w-4 h-4 mr-3 text-red-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                          </svg>
                          Hapus
                        </button>
                      </li>
                    </ul>
                  </div>

                  <div id="deleteModal-{{ $post->id }}" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                      <div
                        class="relative p-4 text-center bg-slate-800 rounded-2xl shadow-2xl border border-slate-700 sm:p-5">
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
                        <div
                          class="w-12 h-12 rounded-full bg-red-900/30 p-2 flex items-center justify-center mx-auto mb-4">
                          <svg class="text-red-500 w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                          </svg>
                        </div>
                        <p class="mb-1 text-lg font-bold text-white">Hapus Postingan?</p>
                        <p class="mb-6 text-slate-400 text-sm">Apakah Anda yakin ingin menghapus
                          "{{ Str::limit($post->title, 20) }}"? Tindakan ini tidak dapat dibatalkan.</p>

                        <form action="/dashboard/{{ $post->slug }}" method="POST"
                          class="flex justify-center items-center space-x-3">
                          @csrf
                          @method('DELETE')
                          <button data-modal-toggle="deleteModal-{{ $post->id }}" type="button"
                            class="py-2.5 px-5 text-sm font-medium text-slate-300 bg-slate-700 rounded-lg border border-slate-600 hover:bg-slate-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-slate-600 transition-colors">
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

                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      @if ($posts->hasPages())
        <div class="p-4 border-t border-slate-700/50 bg-slate-800/30">
          {{ $posts->links() }}
        </div>
      @endif

    </div>
  </div>
</section>
