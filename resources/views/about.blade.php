<x-layout :title="$title">
  {{-- Our Story --}}
  <section class="pt-20 bg-gray-500">
    <div class="flex flex-col lg:flex-row md:flex-row py-8 px-4 mx-auto max-w-screen-xl lg:py-8">
      <div class="relative -top-10 md:my-auto">
        <img src="{{ asset('img/people-pixel.png') }}" alt="pixel-people" class="w-180 object-contain">
      </div>
      <div class="mx-auto md:ml-8 mt-10 w-full text-center md:text-left lg:text-left mb-8 lg:mb-16">
        <h2 class="mb-3 text-3xl font-bold text-white lg:text-5xl" style="font-family: 'Press Start 2P', monospace;">Our
          Story</h2>
        <p class="text-start text-gray-200 sm:text-sm" style="font-family:'Fira Mono', monospace;">Pixel
          Rhythm Society lahir dari satu visi sederhana: tumbuh bareng dan saling kasih dampak positif. Awalnya, kita
          cuma sekumpulan teman yang suka nongkrong di Discord, ngobrol tugas kampus, curhat, belajar bareng, sampai
          chill dengerin musik atau main game. Lama-lama kepikiran, “Kenapa nggak bikin space sendiri aja?” Akhirnya
          lahirlah server Discord PRS, jadi rumah buat siapa aja yang mau ngerjain tugas, diskusi, atau sekadar random
          ngobrol.

          Buat kami, hidup itu bukan lomba siapa paling cepat, tapi tentang seberapa besar dampak baik yang bisa kita
          kasih ke sekitar. PRS dibangun biar kita bisa terus growth bareng, saling support, dan siapa tahu manfaatnya
          bisa makin luas. Dari Discord, ide makin berkembang—mulai dari website sederhana buat sharing & CRUD blog
          post, sampai ke depannya pengen jadi learning platform yang open, kolaboratif, dan impactful buat lebih banyak
          orang.</p>
      </div>
    </div>
  </section>
  {{-- End Our Story --}}

  {{-- Our Skills --}}
  <section class="bg-gray-800 dark:bg-gray-900">
    <div class="max-w-7xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
      <div class="flex flex-col lg:flex-row items-center lg:items-start gap-12">
        <!-- SKILLS -->
        <div class="w-full lg:w-1/2">
          <h3 class="text-2xl text-center lg:text-start font-bold text-gray-100 mb-6 font-pixel tracking-wide">Our
            Members Skills</h3>
          <div class="mb-4">
            <div class="flex justify-between mb-1">
              <span class="text-base font-medium text-blue-400">Frontend Developer</span>
              <span class="text-sm font-medium text-blue-400">40%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
              <div class="bg-blue-600 h-2.5 rounded-full" style="width: 40%"></div>
            </div>
          </div>

          <div class="mb-4">
            <div class="flex justify-between mb-1">
              <span class="text-base font-medium text-green-400">UI/UX</span>
              <span class="text-sm font-medium text-green-400">20%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
              <div class="bg-green-500 h-2.5 rounded-full" style="width: 20%"></div>
            </div>
          </div>

          <div class="mb-4">
            <div class="flex justify-between mb-1">
              <span class="text-base font-medium text-yellow-400">Backend Developer</span>
              <span class="text-sm font-medium text-yellow-400">30%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
              <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 30%"></div>
            </div>
          </div>

          <div class="mb-4">
            <div class="flex justify-between mb-1">
              <span class="text-base font-medium text-slate-400">Networking</span>
              <span class="text-sm font-medium text-slate-400">10%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
              <div class="bg-slate-500 h-2.5 rounded-full" style="width: 10%"></div>
            </div>
          </div>
          <!-- Tambahkan skill bar lain di sini -->
        </div>
        <!-- STATISTICS KANAN -->
        <div class="w-full lg:w-1/2 my-auto flex flex-col items-center">
          <dl class="grid grid-cols-2 gap-8 w-full mb-8">
            <div class="flex flex-col items-center justify-center">
              <dt class="mb-2 text-3xl md:text-4xl font-extrabold text-gray-200">50+</dt>
              <dd class="font-light text-gray-400 dark:text-gray-400">members</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
              <dt class="mb-2 text-3xl md:text-4xl font-extrabold text-gray-200">30+</dt>
              <dd class="font-light text-gray-400 dark:text-gray-400">articles</dd>
            </div>
            <div class="flex flex-col items-center justify-center col-span-2">
              <dt class="mb-2 text-3xl md:text-4xl font-extrabold text-gray-200">4+</dt>
              <dd class="font-light text-gray-400 dark:text-gray-400">mentors</dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
  </section>
  {{-- End Our Skills --}}

  {{-- Our Team --}}
  <section class="dark:bg-gray-600">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
      <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        <h2 class="mb-3 text-3xl lg:text-5xl font-bold text-white" style="font-family: 'Press Start 2P', monospace;">Our
          Team</h2>
        <p class="text-gray-200 lg:mb-16 sm:text-sm dark:text-gray-400 text-shadow-lg"
          style="font-family: 'Fira Mono', monospace;">Our team is just a group
          of
          friends who love to grow together. Kami ngoding, sharing, diskusi, dan saling support supaya PRS jadi tempat
          yang nyaman dan bermanfaat buat siapa pun yang gabung.</p>
      </div>

      {{-- INI BAGIAN YANG BERUBAH --}}
      <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
        {{-- Profile 1 --}}
        <x-team name="Muhammad Yudi Setiawan" role="Founder PRS" job="Web Development"
          desc="Fullstack Developer spesialis Laravel, handle semua dari frontend, backend, API sampai deployment. Aktif eksplor Tailwind, Livewire, dan DevOps tools biar workflow makin efisien."
          image="{{ asset('img/3.jpg') }}" :links="[
              'facebook' => 'https://facebook.com/yudsetiawann',
              'instagram' => 'https://instagram.com/yset___/',
              'github' => 'https://github.com/yudsetiawann/',
          ]" />

        {{-- Profile 2 --}}
        <x-team name="Fredy Fajar Adi Putra" role="Backend Developer" job="Web Development"
          desc="Backend Engineer yang terbiasa pakai CodeIgniter, Laravel, dan Node.js. Fokus di pembuatan API, optimasi database, dan integrasi sistem."
          image="{{ asset('img/gojo.jpg') }}" :links="[
              'facebook' => 'https://facebook.com/fredyy.fajarr',
              'instagram' => 'https://instagram.com/fredyyfajarr_/',
              'github' => 'https://github.com/',
          ]" />

        <div class="max-w-xl mx-auto md:col-span-2">
          {{-- Profile 3 --}}
          <x-team name="Maulana Aulia Rahman" role="Frontend Developer" job="Web Development"
            desc="Frontend Engineer dengan pengalaman di bidang pengembangan Software serta Keahlian lain seperti Cloud Computing dalam integrasi server yang efisien."
            image="{{ asset('img/4.jpg') }}" :links="[
                'facebook' => 'https://facebook.com/fadly.ramadhan.1865',
                'instagram' => 'https://instagram.com/caidenrev/',
                'github' => 'https://github.com/caidenrev/',
            ]" />
        </div>
      </div>
    </div>
  </section>
  {{-- End Our Team --}}

  {{-- Tech Stack --}}
  <section class="bg-[#222b39] py-16">
    <div class="max-w-6xl mx-auto px-4">
      <h2 class="text-3xl md:text-5xl font-bold text-center mb-4 text-white"
        style="font-family: 'Press Start 2P', monospace;">Tech Stack</h2>
      <p class="text-center text-gray-300 mb-12" style="font-family: 'Fira Mono', monospace;">
        Dijalankan dengan teknologi modern agar performa maksimal dan pengalaman coding yang fun!
      </p>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Laravel -->
        <x-tech-stack image="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg"
          stack="Laravel" descStack="Framework PHP andalan buat backend modern & API." />
        <!-- Tailwind CSS -->
        <x-tech-stack image="https://devicon-website.vercel.app/api/tailwindcss/plain.svg" stack="Tailwind CSS"
          descStack="Bikin UI pixel-style sat-set, responsive, langsung di HTML." />
        <!-- SQLite -->
        <x-tech-stack image="https://devicon-website.vercel.app/api/sqlite/original.svg" stack="SQLite"
          descStack="Database ringan, simple, cocok buat project skala kecil sampai menengah." />
        <!-- GitHub -->
        {{-- <x-tech-stack image="{{ asset('img/github.svg') }}" stack="Github" descStack="Version control dan kolaborasi bareng tim."
        /> --}}
        <!-- CPanel -->
        <x-tech-stack image="{{ asset('img/cpanel.svg') }}" stack="CPanel"
          descStack="Deploy & manage project dengan mudah di shared hosting." />
      </div>
    </div>
  </section>
  {{-- End Tech Stack --}}

  <x-footer />
</x-layout>
