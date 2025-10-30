<x-layout :title="$title">
  <section class="dark:bg-gray-900 bg-[url('/public/img/bg3.jpg')] bg-cover">
    <div class="flex flex-col lg:flex-row py-4 px-4 lg:py-20 lg:px-6 items-center lg:items-start gap-6 mx-auto max-w-7xl sm:px-6">
      <div>
        <img src="{{ asset('img/PRS.png') }}" alt="logo-prs" class="w-52 sm:w-72 md:w-96 lg:w-110">
      </div>
      <div class="mx-auto mt-8 lg:mt-0 max-w-screen-sm mb-8 lg:mb-16 text-center lg:text-left">
        <h2
          class="mb-3 text-3xl sm:text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 to-indigo-600"
          style="-webkit-text-stroke: 0.1px white; font-family: 'Press Start 2P', monospace;">
          Welcome to Pixel Rhythm Society
        </h2>
        <p class="text-gray-200 lg:mb-8 text-xs sm:text-sm md:text-base dark:text-gray-400 text-shadow-lg"
          style="-webkit-text-stroke: 0.1px black; font-family: 'Press Start 2P', monospace;">
          Temukan dunia di mana ide dan kreativitas dituangkan dalam bentuk tulisan. Di sini, kamu bisa membaca beragam
          blog inspiratif tanpa
          perlu login, atau bergabung untuk mulai menulis, mengedit, dan menghapus blog versimu sendiri.
          <br><br>
          Mulailah petualangan menulismu dan bagikan ritme pikiranmu bersama kami!
        </p>
        <div class="flex justify-center lg:justify-start gap-5 mt-4">
          <a href="/posts"
            class="inline-flex gap-2 bg-yellow-400 text-white font-bold rounded-md px-4 py-2 border-b-4 border-yellow-600 shadow-md hover:bg-yellow-300 transform transition duration-200 hover:scale-105 cursor-pointer"
            style="font-family: 'Inter', monospace;">
            Get Started
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
            </svg>
          </a>
          <a href="https://discord.gg/2c8V2eYx" target="_blank"
            class="inline-flex gap-2 bg-blue-700 text-white font-bold rounded-md px-4 py-2 border-b-4 border-blue-900 shadow-md hover:bg-blue-500 transform transition duration-200 hover:scale-105 cursor-pointer"
            style="font-family: 'Inter', monospace;">
            Join Discord
            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
              height="24" fill="currentColor" viewBox="0 0 24 24">
              <path
                d="M18.942 5.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.586 11.586 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3 17.392 17.392 0 0 0-2.868 11.662 15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.638 10.638 0 0 1-1.706-.83c.143-.106.283-.217.418-.331a11.664 11.664 0 0 0 10.118 0c.137.114.277.225.418.331-.544.328-1.116.606-1.71.832a12.58 12.58 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM8.678 14.813a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.929 1.929 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </section>
</x-layout>
