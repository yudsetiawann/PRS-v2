<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 antialiased">
  <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
    <article
      class="mx-auto w-full max-w-4xl p-6 border-4 border-yellow-400 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] bg-white format format-sm sm:format-base lg:format-lg format-blue dark:format-invert rounded-sm">
      <a href="/dashboard"
        class="inline-flex text-sm items-center gap-2 bg-blue-500 text-white font-pixel px-3 py-1 border-b-4 border-blue-800 shadow-[4px_4px_0px_rgba(0,0,0,1)] rounded-sm hover:bg-blue-400 transform transition duration-200 hover:scale-105 no-underline cursor-pointer">
        &laquo; Back
      </a>
      <header class="my-4 lg:mb-6 not-format">
        {{-- <address class="flex items-center mb-6 not-italic"> --}}
        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
          <img class="mr-4 w-16 h-16 rounded-full border-2 border-yellow-400 dark:border-white object-cover"
            src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/default-avatar.jpg') }}"
            alt="{{ $post->author->name }}">
          <div>
            <a href="/userprof/{{ $post->author->username }}" rel="author"
              class="text-lg font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
            <a class="block" href="/categories/{{ $post->category->slug }}">
              <span
                class="{{ $post->category->color }} font-pixel text-xs inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                {{ $post->category->name }}
              </span>
            </a>
            <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                title="February 8th, 2022">{{ $post->created_at->format('d M Y') }}</time></p>
          </div>
        </div>
        {{-- </address> --}}

        {{-- Button Edit & Delete --}}
        <div class="flex ml-19 mb-5 gap-3 items-center">
          <div class="flex items-center space-x-3 sm:space-x-4">
            <a href="/dashboard/{{ $post->slug }}/edit"
              class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-3 py-2 text-center">
              <svg aria-hidden="true" class="mr-1 -ml-1 size-5" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                <path fill-rule="evenodd"
                  d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                  clip-rule="evenodd" />
              </svg>
              Edit
            </a>
          </div>
          <button type="button" data-modal-target="deleteModal-{{ $post->id }}"
            data-modal-toggle="deleteModal-{{ $post->id }}"
            class="inline-flex items-center text-white
            bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg
            text-sm px-3 py-2 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
            <svg aria-hidden="true" class="size-5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                clip-rule="evenodd" />
            </svg>
            Delete
          </button>
        </div>
        <form action="/dashboard/{{ $post->slug }}" method="POST">
          @csrf
          @method('DELETE')
          <!-- Delete modal -->
          <div id="deleteModal-{{ $post->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
              <!-- Modal content -->
              <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <button type="button"
                  class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                  data-modal-toggle="deleteModal-{{ $post->id }}">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd" />
                  </svg>
                  <span class="sr-only">Close modal</span>
                </button>
                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                  fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                    clip-rule="evenodd" />
                </svg>
                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?
                </p>
                <div class="flex justify-center items-center space-x-4">
                  <button data-modal-toggle="deleteModal-{{ $post->id }}" type="button"
                    class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                    cancel</button>
                  <button type="submit"
                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Yes,
                    I'm sure</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        {{-- Akhir Button Edit & Delete --}}

        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 text-center lg:mb-8 lg:text-4xl">
          "{{ $post->title }}"</h1>
      </header>
      <div>{!! $post->body !!}</div>
    </article>
  </div>

</main>
