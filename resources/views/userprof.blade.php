<x-layout :title="$title">
  <section class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto overflow-hidden">

      <a href="/posts" class="inline-flex cursor-pointer">
        {{-- Icon (Selalu tampil) --}}
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="size-12 text-violet-500 md:ml-20 transform transition duration-200 hover:scale-105 lg:hidden">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        {{-- Teks cuma di md ke atas --}}
        <span
          class="hidden lg:inline lg:ml-20 bg-blue-500 text-xs tracking-tight text-white border-blue-800 shadow-[4px_4px_0px_rgba(0,0,0,1)] rounded-sm items-center gap-2 m-2 px-2 py-2 hover:bg-blue-400 border-b-4 transform transition duration-200 hover:scale-105 no-underline" style="font-family:'Fira Mono', monospace;">&laquo;
          Back to All Posts</span>
      </a>

      <div class="flex flex-col items-center">
        <img class="w-32 h-32 rounded-full object-cover border-4 border-violet-500"
          src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/default-avatar.jpg') }}"
          alt="{{ $user->name }}" />
        <h2 class="mt-4 text-xl text-center lg:text-2xl font-bold text-gray-900"
          style="font-family: 'Press Start 2P', monospace;">
          {{ $user->name }}
        </h2>
        <div class="text-gray-500 mb-2 font-mono text-lg">
          <span>@</span>{{ $user->username }}
        </div>
        <div class="mt-3 text-md font-medium text-gray-600">
          Total Posts:
          <span class="font-bold text-violet-600">{{ $posts->count() }}</span>
        </div>
      </div>
      <div class="max-w-xl md:max-w-2xl lg:max-w-4xl mx-auto mt-8">
        <h3 class="text-xl font-bold mb-3" style="font-family: 'Fira Mono', monospace;">Articles:</h3>
        @forelse ($posts as $post)
          <a href="/posts/{{ $post->slug }}"
            class="block p-2 mb-2 rounded-lg border border-yellow-400 bg-gray-900 transform transition duration-300 hover:scale-103">
            <div class="mb-2 font-bold text-white">{{ $post->title }}</div>
            <div class="text-xs text-gray-500">{{ $post->created_at->format('d M Y') }}</div>
          </a>
        @empty
          <div class="text-gray-400 italic text-center">Belum ada postingan.</div>
        @endforelse
        <div class="mt-4">
          {{ $posts->links('paginations.flowpag') }}
        </div>
      </div>
    </div>
  </section>
  <x-footer />
</x-layout>
