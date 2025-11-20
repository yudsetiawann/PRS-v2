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
