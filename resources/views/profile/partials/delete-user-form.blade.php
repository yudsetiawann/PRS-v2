<section
  class="bg-slate-800/50 backdrop-blur-md rounded-2xl border border-red-900/30 shadow-xl p-6 sm:p-8 max-w-2xl mx-auto mt-10">
  <header class="mb-6">
    <h2 class="text-xl font-bold text-red-400">
      {{ __('Delete Account') }}
    </h2>

    <p class="mt-1 text-sm text-slate-400">
      {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
    </p>
  </header>

  <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    class="inline-flex items-center justify-center rounded-xl bg-red-600/10 border border-red-600/50 px-6 py-2.5 text-sm font-semibold text-red-500 hover:bg-red-600 hover:text-white transition-all focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-slate-800">
    {{ __('Delete Account') }}
  </button>

  <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-slate-800 text-slate-300">
      @csrf
      @method('delete')

      <h2 class="text-lg font-bold text-white">
        {{ __('Are you sure you want to delete your account?') }}
      </h2>

      <p class="mt-2 text-sm text-slate-400">
        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
      </p>

      <div class="mt-6">
        <label for="password" class="sr-only">{{ __('Password') }}</label>

        <input id="password" name="password" type="password"
          class="block w-3/4 rounded-xl border border-slate-600 bg-slate-900 p-3 text-white placeholder-slate-500 focus:border-red-500 focus:ring-red-500 sm:text-sm transition-colors"
          placeholder="{{ __('Password') }}" />

        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
      </div>

      <div class="mt-6 flex justify-end gap-3">
        <button type="button" x-on:click="$dispatch('close')"
          class="inline-flex items-center justify-center rounded-xl border border-slate-600 bg-transparent px-4 py-2 text-sm font-medium text-slate-300 transition-all hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500">
          {{ __('Cancel') }}
        </button>

        <button type="submit"
          class="inline-flex items-center justify-center rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-red-500/20 transition-all hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-slate-800">
          {{ __('Delete Account') }}
        </button>
      </div>
    </form>
  </x-modal>
</section>
