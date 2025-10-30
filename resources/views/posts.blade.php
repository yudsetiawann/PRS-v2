<x-layout :title="$title">
  <section class="bg-gradient-to-br from-[#11182B] via-[#283559] to-[#7C3AED]">
    <div class="py-10 px-4 mx-auto max-w-4xl lg:px-6 sm:px-6">
      <a href="/posts" class="md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="size-10 mb-3 -mt-5 text-blue-500 transform transition duration-200 hover:scale-105 md:hidden">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
      </a>
      <form class="max-w-md mx-auto mb-8">
        @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <label for="default-search"
          class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </div>
          <input type="search" id="default-search"
            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search Posts Title..." autocomplete="off" autofocus name="search" />
          <button type="submit"
            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
      </form>


      <h1 class="text-xl font-semibold text-white mb-2 md:mb-0">{{ $title }}</h1>
      {{ $posts->links() }}
      <div class="mt-5 mb-5 grid gap-8">
        @forelse ($posts as $post)
          <article
            class="transform transition duration-300 hover:scale-102 bg-gray-900 p-8 rounded-md border hover:border-2 border-yellow-400 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
            <div class="flex justify-between items-center mb-5 text-gray-500">
              <a href="/posts?category={{ $post->category->slug }}">
                <span
                  class="{{ $post->category->color }} font-pixel text-grey-600 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded transform transition duration-200 hover:scale-105">
                  {{ $post->category->name }}
                </span>
              </a>
              <span class="text-xs text-gray-200">{{ $post->created_at->diffForHumans() }}</span>
            </div>

            <h2 class="mb-2 text-xl font-pixel text-white">
              <a href="/posts/{{ $post->slug }}" class="font-bold">"{{ $post->title }}"</a>
            </h2>

            <div class="mb-5 font-light text-gray-200 text-xs">
              {!! Str::limit($post->body, 100) !!}
            </div>

            <div class="flex justify-between items-center">
              <a href="/userprof/{{ $post->author->username }}">
                <div class="flex items-center space-x-2">
                  <img class="w-6 h-6 rounded-full object-cover border-2 border-orange-400"
                    src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/default-avatar.jpg') }}"
                    alt="{{ $post->author->name }}" />
                  <span class="font-medium text-white text-xs">
                    {{ $post->author->name }}
                  </span>
                </div>
              </a>

              <a href="/posts/{{ $post['slug'] }}"
                class="inline-flex items-center text-white hover:text-yellow-300 text-xs gap-1">
                Read more
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
                </svg>
              </a>
            </div>
          </article>

        @empty
          <div class="text-center">
            <p class="font-semibold text-xl my-4 text-white" style="font-family: 'Press start 2P';">Article Not Found!
            </p>
            <a href="/posts"
              class="inline-flex text-xs tracking-tight items-center gap-2 bg-blue-500 text-white font-pixel px-2 py-2 border-b-4 border-blue-800 shadow-[4px_4px_0px_rgba(0,0,0,1)] rounded-sm hover:bg-blue-400 transform transition duration-200 hover:scale-105 no-underline cursor-pointer"
              style="font-family:'Fira Mono', monospace;">
              &laquo; Back to All Posts
            </a>
          </div>
        @endforelse
      </div>
      {{ $posts->links() }}
    </div>
  </section>

  <x-footer />
</x-layout>
