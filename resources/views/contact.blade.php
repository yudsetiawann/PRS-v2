<x-layout :title="$title">
  <div class="flex flex-col lg:flex-row max-w-7xl mx-auto lg:my-10 p-6 sm:p-8 gap-6">
    <div
      class="w-full lg:w-1/2 text-center bg-gray-900 p-8 rounded-md border-4 border-yellow-400 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
      <h3 class="text-xl md:text-2xl mb-4 font-bold text-white" style="font-family: 'Press Start 2P', monospace">
        Info Layanan
      </h3>
      <div class="mb-3">
        <div class="text-lg text-gray-200 font-bold mb-1 tracking-wide">
          Jam Operasional
        </div>
        <div class="text-base text-gray-200 font-mono">
          Senin – Jumat <br>
          09.00 – 17.00 WIB
        </div>
      </div>
      <div class="mb-1">
        <div class="text-lg text-gray-200 font-bold mb-1 tracking-wide">
          Response Time
        </div>
        <div class="text-base text-gray-300 font-mono">
          Kami biasanya membalas pesan dalam <span class="text-indigo-700 font-bold">1×24 jam</span> (hari kerja).
        </div>
      </div>
      <div class="mt-4 text-xs text-gray-400">
        *Luar jam operasional, balasan bisa lebih lama.<br>
        Join Discord/WA agar tetap update info terbaru!
        {{-- Maps --}}
        <div
          class="mt-3 rounded-xl border-2 border-violet-500 overflow-hidden w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-xl my-auto mx-auto">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63445.89828501501!2d106.65033817291261!3d-6.346286407033338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e5a6e26dc3cd%3A0xccd6344b8021119d!2sPamulang%20University%20Campus%202%20(UNPAM%20Viktor)!5e0!3m2!1sen!2sid!4v1752765098110!5m2!1sen!2sid"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        {{-- End Maps --}}
      </div>
    </div>
    {{-- blcok contact --}}
    <div
      class="w-full lg:w-1/2 bg-gray-900 p-8 rounded-md border-4 border-yellow-400 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
      <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="mb-4 text-2xl text-center sm:text-3xl md:text-4xl font-bold text-white"
          style="font-family: 'Press Start 2P', monospace;">Get In Touch
        </h2>
        <p class="mb-8 lg:mb-16 font-light text-sm text-center text-gray-200"
          style="font-family: 'Fira Mono', monospace;">Got a
          technical
          issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.
        </p>
        <form id="wa-form" class="space-y-6">
          <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-300">Your name</label>
            <input type="text" id="name"
              class="shadow-sm bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
              placeholder="Type your full name" required>
          </div>
          <div>
            <label for="subject" class="block mb-2 text-sm font-medium text-gray-300">Subject</label>
            <input type="text" id="subject"
              class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500"
              placeholder="Let us know how we can help you" required>
          </div>
          <div class="sm:col-span-2">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-300">Your message</label>
            <textarea id="message" rows="6"
              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500"
              placeholder="Leave a comment..."></textarea>
          </div>
          <button type="submit"
            class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Send Message
          </button>
        </form>

      </div>
    </div>
    {{-- End block contact --}}
  </div>

  <x-footer />
</x-layout>

<script>
  document.getElementById('wa-form').addEventListener('submit', function(event) {
    event.preventDefault();

    // Ambil value input
    var name = document.getElementById('name').value.trim();
    var subject = document.getElementById('subject').value.trim();
    var message = document.getElementById('message').value.trim();

    // Format pesan WhatsApp
    var waText = `Halo, saya *${name}*\nSubjek: *${subject}*\nPesan: ${message}`;
    var phone = "6285186072004";
    var waURL = `https://wa.me/${phone}?text=${encodeURIComponent(waText)}`;

    // Buka WhatsApp
    window.open(waURL, "_blank");
  });
</script>
