<x-layout :title="$title">
  <div class="bg-slate-900 min-h-screen relative overflow-hidden">

    <div
      class="absolute top-0 left-0 w-full h-[500px] bg-indigo-600/10 rounded-full mix-blend-screen filter blur-[120px] opacity-30 pointer-events-none">
    </div>
    <div
      class="absolute bottom-0 right-0 w-[800px] h-[800px] bg-cyan-600/5 rounded-full mix-blend-screen filter blur-[120px] opacity-20 pointer-events-none">
    </div>

    <section class="relative pt-24 pb-20 lg:pt-32 lg:pb-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

          <div class="relative order-2 lg:order-1">
            <div
              class="absolute inset-0 bg-gradient-to-tr from-indigo-500 to-cyan-500 rounded-3xl transform rotate-3 opacity-20 blur-lg">
            </div>
            <div class="relative rounded-3xl overflow-hidden border border-slate-700/50 shadow-2xl">
              <img src="{{ asset('img/people-pixel.png') }}" alt="Community Vibe"
                class="w-full h-full object-cover bg-slate-800/50 backdrop-blur">
            </div>
          </div>

          <div class="order-1 lg:order-2">
            <h2 class="text-lg font-semibold text-indigo-400 mb-2 tracking-wide uppercase">Tentang Kami</h2>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
              Tumbuh Bersama,<br>
              <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">Berdampak
                Positif.</span>
            </h1>

            <div class="space-y-6 text-slate-300 text-lg leading-relaxed">
              <p>
                Pixel Rhythm Society lahir dari visi sederhana. Awalnya, kami hanya sekumpulan teman di Discord yang
                suka nongkrong, bahas tugas, hingga main game. Namun, kami sadar: <span
                  class="text-white font-medium">"Kenapa nggak bikin space yang lebih serius?"</span>
              </p>
              <p>
                Buat kami, hidup bukan perlombaan siapa paling cepat, tapi seberapa besar dampak yang bisa kita beri.
                PRS adalah rumah untuk belajar, kolaborasi, dan berkarya. Dari sekadar grup chat, kini kami berkembang
                menjadi platform untuk berbagi wawasan teknologi.
              </p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="py-20 bg-slate-800/30 border-y border-slate-800/50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-16">

          <div class="w-full lg:w-1/2">
            <h3 class="text-2xl font-bold text-white mb-8">Komposisi Keahlian</h3>
            <div class="space-y-6">

              <div>
                <div class="flex justify-between mb-2">
                  <span class="text-sm font-medium text-slate-300">Frontend Developer</span>
                  <span class="text-sm font-medium text-indigo-400">40%</span>
                </div>
                <div class="w-full bg-slate-700 rounded-full h-2">
                  <div class="bg-gradient-to-r from-indigo-500 to-cyan-500 h-2 rounded-full" style="width: 40%"></div>
                </div>
              </div>

              <div>
                <div class="flex justify-between mb-2">
                  <span class="text-sm font-medium text-slate-300">Backend Developer</span>
                  <span class="text-sm font-medium text-indigo-400">30%</span>
                </div>
                <div class="w-full bg-slate-700 rounded-full h-2">
                  <div class="bg-gradient-to-r from-indigo-500 to-cyan-500 h-2 rounded-full" style="width: 30%"></div>
                </div>
              </div>

              <div>
                <div class="flex justify-between mb-2">
                  <span class="text-sm font-medium text-slate-300">UI/UX Design</span>
                  <span class="text-sm font-medium text-indigo-400">20%</span>
                </div>
                <div class="w-full bg-slate-700 rounded-full h-2">
                  <div class="bg-gradient-to-r from-indigo-500 to-cyan-500 h-2 rounded-full" style="width: 20%"></div>
                </div>
              </div>

              <div>
                <div class="flex justify-between mb-2">
                  <span class="text-sm font-medium text-slate-300">Networking & DevOps</span>
                  <span class="text-sm font-medium text-indigo-400">10%</span>
                </div>
                <div class="w-full bg-slate-700 rounded-full h-2">
                  <div class="bg-gradient-to-r from-indigo-500 to-cyan-500 h-2 rounded-full" style="width: 10%"></div>
                </div>
              </div>

            </div>
          </div>

          <div class="w-full lg:w-1/2 grid grid-cols-2 gap-6">
            <div
              class="bg-slate-800 p-6 rounded-2xl border border-slate-700 hover:border-indigo-500/50 transition-colors text-center">
              <dt class="text-4xl font-extrabold text-white mb-1">50+</dt>
              <dd class="text-sm text-slate-400 uppercase tracking-wider">Members</dd>
            </div>
            <div
              class="bg-slate-800 p-6 rounded-2xl border border-slate-700 hover:border-indigo-500/50 transition-colors text-center">
              <dt class="text-4xl font-extrabold text-white mb-1">30+</dt>
              <dd class="text-sm text-slate-400 uppercase tracking-wider">Articles</dd>
            </div>
            <div
              class="col-span-2 bg-slate-800 p-6 rounded-2xl border border-slate-700 hover:border-indigo-500/50 transition-colors text-center">
              <dt class="text-4xl font-extrabold text-white mb-1">4+</dt>
              <dd class="text-sm text-slate-400 uppercase tracking-wider">Core Mentors</dd>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="py-20 lg:py-28 relative">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Meet the Team</h2>
          <p class="text-slate-400 text-lg">
            Sekumpulan teman yang hobi ngoding dan berbagi. Kami membangun PRS agar menjadi tempat yang nyaman untuk
            berkembang.
          </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

          <div
            class="group relative bg-slate-800/50 rounded-2xl overflow-hidden border border-slate-700 hover:border-indigo-500 transition-all duration-300 hover:-translate-y-2">
            <div class="h-32 bg-gradient-to-r from-indigo-600 to-blue-600"></div>
            <div class="px-6 pb-6">
              <div class="relative -mt-16 mb-4 text-center">
                <img src="{{ asset('img/nagi.jpg') }}" alt="Member"
                  class="w-32 h-32 rounded-full border-4 border-slate-800 object-cover mx-auto shadow-lg">
              </div>
              <div class="text-center mb-6">
                <h3 class="text-xl font-bold text-white">Muhammad Yudi S.</h3>
                <p class="text-indigo-400 font-medium text-sm">Founder & Fullstack</p>
              </div>
              <p class="text-slate-400 text-sm text-center mb-6 leading-relaxed">
                Spesialis Laravel, handle frontend hingga deployment. Aktif eksplor Tailwind, Livewire, dan DevOps.
              </p>
              <div class="flex justify-center gap-4 pt-4 border-t border-slate-700/50">
                <a href="https://github.com/yudsetiawann/"
                  class="text-slate-400 hover:text-white transition-colors"><span class="text-xs">Github</span></a>
                <a href="https://instagram.com/yudstwan_/"
                  class="text-slate-400 hover:text-pink-400 transition-colors"><span class="text-xs">IG</span></a>
              </div>
            </div>
          </div>

          <div
            class="group relative bg-slate-800/50 rounded-2xl overflow-hidden border border-slate-700 hover:border-indigo-500 transition-all duration-300 hover:-translate-y-2">
            <div class="h-32 bg-gradient-to-r from-purple-600 to-indigo-600"></div>
            <div class="px-6 pb-6">
              <div class="relative -mt-16 mb-4 text-center">
                <img src="{{ asset('img/gojo.jpg') }}" alt="Member"
                  class="w-32 h-32 rounded-full border-4 border-slate-800 object-cover mx-auto shadow-lg">
              </div>
              <div class="text-center mb-6">
                <h3 class="text-xl font-bold text-white">Fredy Fajar A.P.</h3>
                <p class="text-indigo-400 font-medium text-sm">Backend Developer</p>
              </div>
              <p class="text-slate-400 text-sm text-center mb-6 leading-relaxed">
                Backend Engineer (CodeIgniter, Laravel, Node.js). Fokus di API, optimasi database, dan integrasi sistem.
              </p>
              <div class="flex justify-center gap-4 pt-4 border-t border-slate-700/50">
                <a href="https://github.com/fredyyfajarr/"
                  class="text-slate-400 hover:text-white transition-colors"><span class="text-xs">Github</span></a>
                <a href="https://instagram.com/fredyyfajarr_/"
                  class="text-slate-400 hover:text-pink-400 transition-colors"><span class="text-xs">IG</span></a>
              </div>
            </div>
          </div>

          <div
            class="group relative bg-slate-800/50 rounded-2xl overflow-hidden border border-slate-700 hover:border-indigo-500 transition-all duration-300 hover:-translate-y-2 lg:col-span-1 md:col-span-2 md:max-w-md md:mx-auto lg:max-w-none">
            <div class="h-32 bg-gradient-to-r from-cyan-600 to-blue-600"></div>
            <div class="px-6 pb-6">
              <div class="relative -mt-16 mb-4 text-center">
                <img src="{{ asset('img/4.jpg') }}" alt="Member"
                  class="w-32 h-32 rounded-full border-4 border-slate-800 object-cover mx-auto shadow-lg">
              </div>
              <div class="text-center mb-6">
                <h3 class="text-xl font-bold text-white">Maulana Aulia R.</h3>
                <p class="text-indigo-400 font-medium text-sm">Frontend Developer</p>
              </div>
              <p class="text-slate-400 text-sm text-center mb-6 leading-relaxed">
                Frontend Engineer dengan keahlian software development serta Cloud Computing dan integrasi server.
              </p>
              <div class="flex justify-center gap-4 pt-4 border-t border-slate-700/50">
                <a href="https://github.com/Astheric/" class="text-slate-400 hover:text-white transition-colors"><span
                    class="text-xs">Github</span></a>
                <a href="https://www.instagram.com/rhmn_maulana/"
                  class="text-slate-400 hover:text-pink-400 transition-colors"><span class="text-xs">IG</span></a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="py-20 bg-slate-900 border-t border-slate-800 relative">
      <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-white mb-3">Tech Stack</h2>
          <p class="text-slate-400">Teknologi modern untuk performa maksimal dan pengalaman coding yang menyenangkan.
          </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

          <div
            class="p-6 bg-slate-800/40 border border-slate-700 rounded-xl flex flex-col items-center text-center hover:bg-slate-800 transition-colors">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" alt="Laravel"
              class="w-12 h-12 mb-4">
            <h4 class="text-white font-bold mb-1">Laravel</h4>
            <p class="text-xs text-slate-500">Modern PHP Framework</p>
          </div>

          <div
            class="p-6 bg-slate-800/40 border border-slate-700 rounded-xl flex flex-col items-center text-center hover:bg-slate-800 transition-colors">
            <img src="https://devicon-website.vercel.app/api/tailwindcss/plain.svg" alt="Tailwind"
              class="w-12 h-12 mb-4">
            <h4 class="text-white font-bold mb-1">Tailwind CSS</h4>
            <p class="text-xs text-slate-500">Utility-First CSS</p>
          </div>

          <div
            class="p-6 bg-slate-800/40 border border-slate-700 rounded-xl flex flex-col items-center text-center hover:bg-slate-800 transition-colors">
            <img src="https://devicon-website.vercel.app/api/mysql/original.svg" alt="MySQL"
              class="w-12 h-12 mb-4">
            <h4 class="text-white font-bold mb-1">MySQL</h4>
            <p class="text-xs text-slate-500">Relational Database</p>
          </div>

          <div
            class="p-6 bg-slate-800/40 border border-slate-700 rounded-xl flex flex-col items-center text-center hover:bg-slate-800 transition-colors">
            <img src="{{ asset('img/cpanel.svg') }}" alt="cPanel" class="w-12 h-12 mb-4">
            <h4 class="text-white font-bold mb-1">cPanel</h4>
            <p class="text-xs text-slate-500">Deployment & Hosting</p>
          </div>

        </div>
      </div>
    </section>

  </div>
</x-layout>
