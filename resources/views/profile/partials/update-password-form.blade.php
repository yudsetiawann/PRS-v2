<section
  class="bg-slate-800/50 backdrop-blur-md rounded-2xl border border-slate-700/60 shadow-xl p-6 sm:p-8 max-w-2xl mx-auto">
  <header class="mb-6">
    <h2 class="text-xl font-bold text-white">
      {{ __('Update Password') }}
    </h2>
    <p class="mt-1 text-sm text-slate-400">
      {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </p>
  </header>

  <form method="post" action="{{ route('password.update') }}" class="space-y-6">
    @csrf
    @method('put')

    <div>
      <label for="update_password_current_password"
        class="block mb-2 text-sm font-medium text-slate-300">{{ __('Current Password') }}</label>
      <input id="update_password_current_password" name="current_password" type="password"
        class="block w-full rounded-xl border border-slate-600 bg-slate-900 p-3 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors"
        autocomplete="current-password" />
      <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
    </div>

    <div>
      <label for="update_password_password"
        class="block mb-2 text-sm font-medium text-slate-300">{{ __('New Password') }}</label>
      <input id="update_password_password" name="password" type="password"
        class="block w-full rounded-xl border border-slate-600 bg-slate-900 p-3 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors"
        autocomplete="new-password" />
      <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
    </div>

    <div>
      <label for="update_password_password_confirmation"
        class="block mb-2 text-sm font-medium text-slate-300">{{ __('Confirm Password') }}</label>
      <input id="update_password_password_confirmation" name="password_confirmation" type="password"
        class="block w-full rounded-xl border border-slate-600 bg-slate-900 p-3 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors"
        autocomplete="new-password" />
      <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center gap-4 pt-4 border-t border-slate-700/50">
      <button type="submit"
        class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition-all hover:bg-indigo-700 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-slate-800">
        {{ __('Save') }}
      </button>

      @if (session('status') === 'password-updated')
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
