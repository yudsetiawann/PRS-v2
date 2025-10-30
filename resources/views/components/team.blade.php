<div
  class="relative group transform transition duration-300 hover:scale-105 border-4 border-amber-400 bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 sm:flex sm:items-stretch">
  <!-- Gradasi Hover -->
  <div
    class="pointer-events-none absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-lg"
    style="background: linear-gradient(90deg, rgba(251,191,36,0.4) 0%, rgba(168,85,247,0.4) 100%); z-index:1;">
  </div>

  <a href="#" class="sm:w-48 w-full flex-shrink-0 z-10">
    <img class="w-full sm:h-full object-cover rounded-t-lg sm:rounded-none sm:rounded-l-lg" src="{{ $image }}"
      alt="{{ $name }}">
  </a>
  <div class="p-5 z-10">
    <h3 class="mt-5 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
      <a href="#">{{ $name }}</a>
    </h3>
    <span class="text-gray-500 font-medium dark:text-gray-400">{{ $role }} | {{ $job }}</span>
    <p class="mt-3 mb-4 text-gray-500 dark:text-gray-400">{{ $desc }}</p>
    <ul class="flex space-x-4 sm:mt-0">
      @if ($links['facebook'])
        <li>
          <a href="{{ $links['facebook'] }}" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd"
                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                clip-rule="evenodd" />
            </svg>
          </a>
        </li>
      @endif
      @if ($links['instagram'])
        <li>
          <a href="{{ $links['instagram'] }}" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
            <svg class="w-[22px] h-[22px]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path fill="currentColor" fill-rule="evenodd"
                d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                clip-rule="evenodd" />
            </svg>
          </a>
        </li>
      @endif
      @if ($links['github'])
        <li>
          <a href="{{ $links['github'] }}" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd"
                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                clip-rule="evenodd" />
            </svg>
          </a>
        </li>
      @endif
    </ul>
  </div>
</div>
