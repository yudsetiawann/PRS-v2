<x-layout title="Manage Categories">
  <div class="pt-24 min-h-screen bg-slate-900 py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="mb-8 flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-4 w-full md:w-auto">
          <a href="{{ route('admin.index') }}"
            class="p-2 rounded-full bg-slate-800 text-slate-400 hover:text-white hover:bg-slate-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
              </path>
            </svg>
          </a>
          <h1 class="text-2xl font-bold text-white">Manajemen Kategori</h1>
        </div>

        <form action="{{ route('admin.categories') }}" method="GET" class="w-full md:w-1/3">
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>
            <input type="text" name="search" value="{{ request('search') }}"
              class="block w-full p-3 pl-10 text-sm text-white border border-slate-700 rounded-xl bg-slate-800 focus:ring-indigo-500 focus:border-indigo-500 placeholder-slate-500 transition-all shadow-lg"
              placeholder="Cari kategori...">
          </div>
        </form>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-1">
          <div
            class="bg-slate-800/50 backdrop-blur-md border border-slate-700/60 rounded-2xl p-6 shadow-xl sticky top-24">
            <h3 class="text-lg font-bold text-white mb-4">Tambah Kategori Baru</h3>
            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
              @csrf
              <div>
                <label for="name" class="block text-sm font-medium text-slate-400 mb-1">Nama Kategori</label>
                <input type="text" name="name" id="name" required
                  class="w-full bg-slate-900 border border-slate-600 rounded-xl px-4 py-2 text-white focus:ring-indigo-500 focus:border-indigo-500 placeholder-slate-500">
                @error('name')
                  <span class="text-red-400 text-xs mt-1">{{ $message }}</span>
                @enderror
              </div>

              <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-xl transition-colors shadow-lg shadow-indigo-500/20">
                Simpan Kategori
              </button>
            </form>
          </div>
        </div>

        <div class="lg:col-span-2">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @forelse ($categories as $category)
              <div
                class="bg-slate-800/30 border border-slate-700 rounded-xl p-4 flex justify-between items-center group hover:border-indigo-500/50 transition-all">
                <div class="flex items-center gap-3">
                  <span class="w-3 h-3 rounded-full bg-indigo-500 shadow-[0_0_10px_rgba(99,102,241,0.5)]"></span>
                  <div>
                    <h4 class="text-white font-semibold">{{ $category->name }}</h4>
                    <p class="text-xs text-slate-500">Slug: {{ $category->slug }}</p>
                  </div>
                </div>

                <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="POST"
                  onsubmit="return confirm('Hapus kategori ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                    class="p-2 text-slate-500 hover:text-red-400 hover:bg-red-500/10 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                      </path>
                    </svg>
                  </button>
                </form>
              </div>
            @empty
              <div
                class="col-span-full py-8 text-center text-slate-500 border border-dashed border-slate-700 rounded-xl">
                Kategori tidak ditemukan.
              </div>
            @endforelse
          </div>
        </div>

      </div>
    </div>
  </div>
</x-layout>
