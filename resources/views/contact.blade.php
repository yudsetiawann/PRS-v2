<x-layout :title="$title">
  <section class="min-h-screen bg-slate-900 relative overflow-hidden py-12 lg:py-20">

    <div
      class="absolute top-0 right-0 -translate-y-12 translate-x-12 w-96 h-96 bg-indigo-600/20 rounded-full mix-blend-screen filter blur-[100px] opacity-40 pointer-events-none">
    </div>
    <div
      class="absolute bottom-0 left-0 translate-y-12 -translate-x-12 w-96 h-96 bg-cyan-600/20 rounded-full mix-blend-screen filter blur-[100px] opacity-30 pointer-events-none">
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

      <div class="text-center max-w-2xl mx-auto mb-16">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight mb-4">
          Hubungi Kami
        </h2>
        <p class="text-slate-400 text-lg">
          Ada pertanyaan teknis atau saran pengembangan? Tim kami siap membantu Anda.
        </p>
      </div>

      <div
        class="bg-slate-800/40 backdrop-blur-md border border-slate-700/50 rounded-3xl overflow-hidden shadow-2xl grid lg:grid-cols-2">

        <div class="bg-indigo-900/20 p-8 lg:p-12 flex flex-col justify-between relative overflow-hidden">
          <div class="absolute inset-0 bg-grid-slate-700/[0.2] bg-[length:32px_32px]"></div>
          <div class="relative z-10">
            <h3 class="text-2xl font-bold text-white mb-8">Informasi Layanan</h3>

            <div class="space-y-8">
              <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                  <div class="flex items-center justify-center h-12 w-12 rounded-xl bg-indigo-500/20 text-indigo-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                  </div>
                </div>
                <div>
                  <h4 class="text-lg font-semibold text-white">Jam Operasional</h4>
                  <p class="mt-1 text-slate-400 text-sm">Senin – Jumat</p>
                  <p class="text-slate-400 text-sm">09.00 – 17.00 WIB</p>
                </div>
              </div>

              <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                  <div class="flex items-center justify-center h-12 w-12 rounded-xl bg-cyan-500/20 text-cyan-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                  </div>
                </div>
                <div>
                  <h4 class="text-lg font-semibold text-white">Waktu Respon</h4>
                  <p class="mt-1 text-slate-400 text-sm">
                    Kami biasanya membalas dalam <span class="text-cyan-400 font-semibold">1×24 jam</span> (hari kerja).
                  </p>
                </div>
              </div>

              <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                  <div class="flex items-center justify-center h-12 w-12 rounded-xl bg-rose-500/20 text-rose-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                  </div>
                </div>
                <div class="w-full">
                  <h4 class="text-lg font-semibold text-white mb-3">Lokasi Kami</h4>
                  <div class="w-full h-48 rounded-xl overflow-hidden shadow-lg border border-slate-700/50">
                    <iframe
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.57311705!3d-6.9034443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1647484484777!5m2!1sen!2sid"
                      width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                      referrerpolicy="no-referrer-when-downgrade"
                      class="grayscale opacity-80 hover:opacity-100 hover:grayscale-0 transition-all duration-500">
                    </iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="p-8 lg:p-12 bg-slate-900/50">
          <form id="wa-form" class="space-y-6">
            <div class="grid gap-6 md:grid-cols-2">
              <div class="col-span-2 md:col-span-1">
                <label for="name" class="block text-sm font-medium text-slate-300 mb-2">Nama Lengkap</label>
                <input type="text" id="name" required
                  class="block w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-slate-100 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder-slate-500"
                  placeholder="John Doe">
              </div>
              <div class="col-span-2 md:col-span-1">
                <label for="subject" class="block text-sm font-medium text-slate-300 mb-2">Subjek</label>
                <input type="text" id="subject" required
                  class="block w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-slate-100 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder-slate-500"
                  placeholder="Kerjasama, Bug, dll">
              </div>
            </div>

            <div>
              <label for="message" class="block text-sm font-medium text-slate-300 mb-2">Pesan</label>
              <textarea id="message" rows="5" required
                class="block w-full px-4 py-3 rounded-xl bg-slate-800 border border-slate-700 text-slate-100 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder-slate-500 resize-none"
                placeholder="Tuliskan detail pesan Anda di sini..."></textarea>
            </div>

            <button type="submit"
              class="w-full inline-flex justify-center items-center px-6 py-4 border border-transparent text-base font-bold rounded-xl text-white bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-500 hover:to-indigo-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg shadow-indigo-500/30 transform transition-all duration-200 hover:-translate-y-1">
              <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 24 24">
                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
              </svg>
              Kirim Pesan via WhatsApp
            </button>

            <p class="text-center text-xs text-slate-500 mt-4">
              Dengan mengirim pesan, Anda akan diarahkan ke aplikasi WhatsApp.
            </p>
          </form>
        </div>

      </div>
    </div>
  </section>

  <x-footer />
</x-layout>

<script>
  document.getElementById('wa-form').addEventListener('submit', function(event) {
    event.preventDefault();

    // Ambil value input
    var name = document.getElementById('name').value.trim();
    var subject = document.getElementById('subject').value.trim();
    var message = document.getElementById('message').value.trim();

    // Format pesan WhatsApp (lebih rapi dengan line breaks)
    var waText = `*Halo Admin PRS,*\n\nSaya: ${name}\nSubjek: ${subject}\n\n*Pesan:*\n${message}`;
    var phone = "6285186072004"; // Ganti dengan nomor yang sesuai jika perlu
    var waURL = `https://wa.me/${phone}?text=${encodeURIComponent(waText)}`;

    // Buka WhatsApp
    window.open(waURL, "_blank");
  });
</script>
