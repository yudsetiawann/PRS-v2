<x-layout title="Admin Dashboard">
  <div class="pt-24 min-h-screen bg-slate-900 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
        <div>
          <h1 class="text-3xl font-bold text-white tracking-tight flex items-center gap-3">
            <span class="text-yellow-500">
              <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                </path>
              </svg>
            </span>
            Admin Control Panel
          </h1>
          <p class="text-slate-400 mt-1">Kelola semua konten pengguna dan pantau aktivitas.</p>
        </div>

        <div class="flex gap-3">
          <a href="{{ route('admin.users') }}"
            class="px-5 py-2.5 bg-indigo-600 text-white hover:bg-indigo-700 rounded-xl transition-all font-medium shadow-lg shadow-indigo-500/20">
            Kelola Users
          </a>

          <a href="{{ route('admin.categories') }}"
            class="px-5 py-2.5 bg-slate-800 text-slate-300 hover:text-white border border-slate-700 rounded-xl hover:bg-slate-700 transition-all font-medium">
            Kelola Kategori
          </a>

          <a href="{{ route('admin.reports') }}"
            class="px-5 py-2.5 bg-red-500/10 text-red-400 hover:bg-red-600 hover:text-white border border-red-500/20 rounded-xl transition-all font-medium flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
              </path>
            </svg>
            Laporan

            @php $pendingCount = \App\Models\Report::where('status', 'pending')->count(); @endphp
            @if ($pendingCount > 0)
              <span class="ml-1 px-1.5 py-0.5 text-[10px] bg-red-600 text-white rounded-full">{{ $pendingCount }}</span>
            @endif
          </a>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl">
          <h3 class="text-slate-400 text-sm font-medium">Total Postingan</h3>
          <p class="text-3xl font-bold text-white mt-2">{{ \App\Models\Post::count() }}</p>
        </div>
        <div class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl">
          <h3 class="text-slate-400 text-sm font-medium">Total User</h3>
          <p class="text-3xl font-bold text-white mt-2">{{ \App\Models\User::count() }}</p>
        </div>
        <div class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl">
          <h3 class="text-slate-400 text-sm font-medium">Total Komentar</h3>
          <p class="text-3xl font-bold text-white mt-2">{{ \App\Models\Comment::count() ?? 0 }}</p>
        </div>
      </div>

      <div class="bg-slate-800/50 backdrop-blur-md border border-slate-700/60 rounded-2xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left text-slate-400">
            <thead class="text-xs text-slate-300 uppercase bg-slate-900/50 border-b border-slate-700">
              <tr>
                <th scope="col" class="px-6 py-4">No</th>
                <th scope="col" class="px-6 py-4">Judul Post</th>
                <th scope="col" class="px-6 py-4">Penulis</th>
                <th scope="col" class="px-6 py-4">Kategori</th>
                <th scope="col" class="px-6 py-4">Tanggal</th>
                <th scope="col" class="px-6 py-4 text-center">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-700">
              @foreach ($posts as $post)
                <tr class="hover:bg-slate-700/30 transition-colors">
                  <td class="px-6 py-4">{{ $loop->iteration + $posts->firstItem() - 1 }}</td>
                  <td class="px-6 py-4 font-medium text-white">
                    <a href="/posts/{{ $post->slug }}" class="hover:text-indigo-400 hover:underline">
                      {{ Str::limit($post->title, 40) }}
                    </a>
                  </td>
                  <td class="px-6 py-4">
                    <div class="flex items-center gap-2">
                      <img
                        src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/default-avatar.jpg') }}"
                        class="w-6 h-6 rounded-full object-cover">
                      <span>{{ $post->author->name }}</span>
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded text-xs bg-slate-700 text-slate-300 border border-slate-600">
                      {{ $post->category->name }}
                    </span>
                  </td>
                  <td class="px-6 py-4">{{ $post->created_at->format('d/m/Y') }}</td>
                  <td class="px-6 py-4 text-center">
                    <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST"
                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus postingan ini secara permanen?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="text-red-400 hover:text-white bg-red-500/10 hover:bg-red-600 border border-red-500/30 rounded-lg px-3 py-1.5 transition-all text-xs font-bold">
                        Hapus Paksa
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="p-4 border-t border-slate-700">
          {{ $posts->links() }}
        </div>
      </div>

    </div>
  </div>
</x-layout>
