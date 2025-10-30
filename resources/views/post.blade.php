{{-- <x-layout :title="$title">

  <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
      <article
        class="mx-auto w-full max-w-4xl p-6 border-4 border-yellow-400 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] bg-white format format-sm sm:format-base lg:format-lg format-blue dark:format-invert rounded-sm">

        <a href="/posts" class="font-medium text-xs text-blue-500 hover:underline">&laquo; Back to all posts</a>
        <header class="my-4 lg:mb-6 not-format">
          <address class="flex items-center mb-6 not-italic">
            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
              <img class="mr-4 w-16 h-16 rounded-full"
                src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/default-avatar.jpg') }}"
                alt="{{ $post->author->name }}">
              <div>
                <a href="/authors/{{ $post->author->username }}" rel="author"
                  class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                <a class="block" href="/categories/{{ $post->category->slug }}">
                  <span
                    class="{{ $post->category->color }} text-grey-600 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                    {{ $post->category->name }}
                  </span>
                </a>
                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                    title="February 8th, 2022">{{ $post->created_at->diffForHumans() }}</time></p>
              </div>
            </div>
          </address>
          <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
            {{ $post->title }}</h1>
        </header>
        <div>{!! $post['body'] !!}</div>
      </article>
    </div>
  </main>
</x-layout> --}}

<x-layout :title="$title">
  <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
      <article
        class="mx-auto w-full max-w-4xl p-6 border-4 border-yellow-400 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] bg-white format format-sm sm:format-base lg:format-lg format-blue dark:format-invert rounded-sm">


        <a href="/posts" class="inline-flex cursor-pointer">
          {{-- Icon (Selalu tampil) --}}
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-12 text-blue-500 transform transition duration-200 hover:scale-105 md:hidden">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          {{-- Teks cuma di md ke atas --}}
          <span
            class="hidden md:inline bg-blue-500 text-xs tracking-tight text-white border-blue-800 shadow-[4px_4px_0px_rgba(0,0,0,1)] rounded-sm items-center gap-2 m-2 px-2 py-2 hover:bg-blue-400 border-b-4 transform transition duration-200 hover:scale-105 no-underline"
            style="font-family:'Fira Mono', monospace;">&laquo;
            Back to All Posts</span>
        </a>

        <header class="my-4 lg:mb-6 not-format">
          <address class="flex items-center mb-6 not-italic">
            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
              <img class="mr-4 w-16 h-16 rounded-full border-2 border-yellow-400 dark:border-white  object-cover"
                src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/default-avatar.jpg') }}"
                alt="{{ $post->author->name }}">

              <div>
                <a href="/userprof/{{ $post->author->username }}" rel="author"
                  class="text-lg text-gray-900 font-bold cursor-pointer">{{ $post->author->name }}</a>

                <a class="block mt-1" href="/posts?category={{ $post->category->slug }}">
                  <span
                    class="{{ $post->category->color }} text-xs inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                    {{ $post->category->name }}
                  </span>
                </a>

                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                  <time pubdate datetime="{{ $post->created_at }}">
                    {{ $post->created_at->format('d M Y') }}
                  </time>
                </p>
              </div>
            </div>
          </address>

          <h1
            class="mb-4 text-3xl font-extrabold text-center leading-tight text-gray-900 lg:mb-8 lg:text-4xl dark:text-white">
            "{{ $post->title }}"</h1>
        </header>

        <div>{!! $post->body !!}</div>
      </article>
    </div>
  </main>

  <x-footer />
</x-layout>
