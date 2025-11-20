<x-layout :title="$title">
  <section class="relative overflow-hidden bg-slate-900 top-0">

    <div class="absolute inset-0 z-0">
      <img src="{{ asset('img/bg3.jpg') }}" alt="Background"
        class="w-full h-full object-cover opacity-20 mix-blend-overlay">
      <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-slate-900/40"></div>
    </div>

    <div
      class="absolute top-0 -left-4 w-72 h-72 bg-indigo-500 rounded-full opacity-20 animate-blob">
    </div>
    <div
      class="absolute top-0 -right-4 w-72 h-72 bg-blue-500 rounded-full filter blur-3xl opacity-20 animate-blob animation-delay-2000">
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
      <div class="grid lg:grid-cols-2 gap-12 items-center">

        <div class="text-center lg:text-left order-2 lg:order-1">
          <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white mb-6">
            Welcome to <br class="hidden lg:block" />
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">
              Pixel Rhythm Society
            </span>
          </h2>

          <p class="text-lg text-slate-300 mb-8 leading-relaxed max-w-2xl mx-auto lg:mx-0">
            Temukan dunia di mana ide dan kreativitas dituangkan dalam bentuk tulisan. Baca beragam blog inspiratif
            tanpa batas, atau bergabunglah untuk mulai menyusun ritme pikiranmu sendiri.
          </p>

          <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
            <a href="/posts"
              class="inline-flex items-center justify-center px-8 py-3 text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-full transition-all duration-300 shadow-lg shadow-indigo-500/30 hover:-translate-y-1">
              Get Started
              <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
              </svg>
            </a>

            <a href="https://discord.gg/2c8V2eYx" target="_blank"
              class="inline-flex items-center justify-center px-8 py-3 text-base font-medium text-slate-300 bg-slate-800/50 border border-slate-700 hover:bg-slate-800 hover:text-white rounded-full backdrop-blur-sm transition-all duration-300 hover:-translate-y-1">
              <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path
                  d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z" />
              </svg>
              Join Discord
            </a>
          </div>
        </div>

        <div class="flex justify-center order-1 lg:order-2 relative">
          <div
            class="absolute inset-0 bg-gradient-to-tr from-indigo-500/30 to-purple-500/30 rounded-full filter blur-2xl transform scale-90">
          </div>

          <img src="{{ asset('img/PRS.png') }}" alt="Pixel Rhythm Society Logo"
            class="relative w-64 sm:w-80 lg:w-full max-w-md drop-shadow-2xl transform transition duration-500 hover:scale-105">
        </div>

      </div>
    </div>
  </section>
</x-layout>
