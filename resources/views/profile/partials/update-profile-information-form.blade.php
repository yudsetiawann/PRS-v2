@push('style')
  <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
  <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />

  <style>
    /* Custom CSS untuk FilePond Dark Mode */
    .filepond--root {
      font-family: 'Inter', sans-serif;
    }

    .filepond--panel-root {
      background-color: #0f172a;
      /* Slate-900 */
      border: 1px solid #334155;
      /* Slate-700 */
    }

    .filepond--drop-label {
      color: #94a3b8;
      /* Slate-400 */
    }

    .filepond--label-action {
      text-decoration-color: #6366f1;
      /* Indigo-500 */
      color: #818cf8;
      /* Indigo-400 */
    }

    .filepond--credits {
      display: none;
    }
  </style>
@endpush

<section
  class="bg-slate-800/50 backdrop-blur-md rounded-2xl border border-slate-700/60 shadow-xl mt-8 p-6 sm:p-8 max-w-2xl mx-auto">
  <header class="mb-6">
    <h2 class="text-xl font-bold text-white">
      {{ __('Profile Information') }}
    </h2>
    <p class="mt-1 text-sm text-slate-400">
      {{ __("Update your account's profile information and email address.") }}
    </p>
  </header>

  <form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
  </form>

  <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div>
      <label for="name" class="block mb-2 text-sm font-medium text-slate-300">{{ __('Name') }}</label>
      <input id="name" name="name" type="text"
        class="block w-full rounded-xl border border-slate-600 bg-slate-900 p-3 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors"
        value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
      @error('name')
        <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="username" class="block mb-2 text-sm font-medium text-slate-300">{{ __('Username') }}</label>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500">@</span>
        <input id="username" name="username" type="text"
          class="block w-full rounded-xl border border-slate-600 bg-slate-900 pl-8 p-3 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors"
          value="{{ old('username', $user->username) }}" required autocomplete="username" />
      </div>
      @error('username')
        <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="email" class="block mb-2 text-sm font-medium text-slate-300">{{ __('Email') }}</label>
      <input id="email" name="email" type="email"
        class="block w-full rounded-xl border border-slate-600 bg-slate-900 p-3 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors"
        value="{{ old('email', $user->email) }}" required autocomplete="email" />
      @error('email')
        <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
      @enderror

      @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
        <div class="mt-2 p-3 rounded-lg bg-yellow-900/20 border border-yellow-700/30">
          <p class="text-sm text-yellow-200">
            {{ __('Your email address is unverified.') }}

            <button form="send-verification"
              class="underline text-sm text-yellow-400 hover:text-yellow-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              {{ __('Click here to re-send the verification email.') }}
            </button>
          </p>

          @if (session('status') === 'verification-link-sent')
            <p class="mt-2 font-medium text-sm text-green-400">
              {{ __('A new verification link has been sent to your email address.') }}
            </p>
          @endif
        </div>
      @endif
    </div>

    <div class="space-y-4 pt-2">
      <h3 class="text-sm font-semibold text-slate-400 uppercase tracking-wider">Social Media</h3>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label for="instagram" class="block mb-2 text-xs font-medium text-slate-300">Instagram Username</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-4 h-4 text-pink-500" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
              </svg>
            </div>
            <input type="text" name="instagram" id="instagram"
              class="block w-full rounded-xl border border-slate-600 bg-slate-900 pl-10 p-3 text-white placeholder-slate-600 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors"
              placeholder="username" value="{{ old('instagram', $user->instagram) }}">
          </div>
          @error('instagram')
            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="linkedin" class="block mb-2 text-xs font-medium text-slate-300">LinkedIn Username</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
              </svg>
            </div>
            <input type="text" name="linkedin" id="linkedin"
              class="block w-full rounded-xl border border-slate-600 bg-slate-900 pl-10 p-3 text-white placeholder-slate-600 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors"
              placeholder="username" value="{{ old('linkedin', $user->linkedin) }}">
          </div>
          @error('linkedin')
            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="github" class="block mb-2 text-xs font-medium text-slate-300">GitHub Username</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
              </svg>
            </div>
            <input type="text" name="github" id="github"
              class="block w-full rounded-xl border border-slate-600 bg-slate-900 pl-10 p-3 text-white placeholder-slate-600 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors"
              placeholder="username" value="{{ old('github', $user->github) }}">
          </div>
          @error('github')
            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
      <div class="flex flex-col items-center justify-center p-4 bg-slate-900 rounded-xl border border-slate-700">
        <span class="text-xs text-slate-500 mb-3 uppercase tracking-wide font-bold">Current Avatar</span>
        <img class="w-24 h-24 rounded-full object-cover border-4 border-slate-700 shadow-lg"
          src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/default-avatar.jpg') }}"
          alt="{{ $user->name }}">
      </div>

      <div class="md:col-span-2">
        <label class="block mb-2 text-sm font-medium text-slate-300" for="avatar">Change Photo</label>
        <input id="avatar" name="avatar" type="file" class="filepond"
          accept="image/png, image/jpeg, image/jpg" />
        @error('avatar')
          <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="flex items-center gap-4 pt-4 border-t border-slate-700/50">
      <button type="submit"
        class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition-all hover:bg-indigo-700 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-slate-800">
        {{ __('Save Changes') }}
      </button>

      @if (session('status') === 'profile-updated')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
          class="text-sm text-green-400 flex items-center gap-1">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
          </svg>
          {{ __('Saved.') }}
        </p>
      @endif
    </div>
  </form>
</section>

@push('script')
  <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
  <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
  <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
  <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
  <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
  <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

  <script>
    // Register Plugins
    FilePond.registerPlugin(
      FilePondPluginImageResize,
      FilePondPluginImageTransform,
      FilePondPluginFileValidateSize,
      FilePondPluginImagePreview,
      FilePondPluginFileValidateType
    );

    // Initialize FilePond
    const inputElement = document.querySelector('#avatar');
    const pond = FilePond.create(inputElement, {
      acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
      maxFileSize: '5MB',
      imageResizeTargetWidth: '600',
      imageResizeMode: 'contain',
      imageResizeUpscale: false,
      credits: false, // Menyembunyikan credit FilePond
      labelIdle: 'Drag & Drop gambar atau <span class="filepond--label-action">Browse</span>',
      stylePanelAspectRatio: 0.5, // Tinggi area dropzone
      stylePanelLayout: 'compact circle',
      styleLoadIndicatorPosition: 'center bottom',
      styleButtonRemoveItemPosition: 'center bottom',
      server: {
        url: '/upload',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      }
    });
  </script>
@endpush
