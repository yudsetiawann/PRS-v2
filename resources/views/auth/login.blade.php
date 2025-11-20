<x-guest-layout>
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <div class="mb-6 text-center">
    <h2 class="text-2xl font-bold text-white">Welcome Back</h2>
    <p class="text-slate-400 text-sm mt-1">Sign in to your account to continue</p>
  </div>

  <form method="POST" action="{{ route('login') }}" class="space-y-5">
    @csrf

    <div>
      <label for="user_cred" class="block mb-2 text-sm font-medium text-slate-300">Email or Username</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-500">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
          </svg>
        </div>
        <input id="user_cred"
          class="bg-slate-900/50 border border-slate-600 text-white text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5 placeholder-slate-500 transition-colors"
          type="text" name="user_cred" :value="old('user_cred')" required autofocus autocomplete="username"
          placeholder="Enter your email or username" />
      </div>
      <x-input-error :messages="$errors->get('user_cred')" class="mt-2" />
    </div>

    <div>
      <div class="flex justify-between items-center mb-2">
        <label for="password" class="text-sm font-medium text-slate-300">Password</label>
        @if (Route::has('password.request'))
          <a class="text-xs text-indigo-400 hover:text-indigo-300 transition-colors"
            href="{{ route('password.request') }}">
            Forgot password?
          </a>
        @endif
      </div>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-500">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
            </path>
          </svg>
        </div>
        <input id="password"
          class="bg-slate-900/50 border border-slate-600 text-white text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5 placeholder-slate-500 transition-colors"
          type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
      </div>
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="block">
      <label for="remember_me" class="inline-flex items-center cursor-pointer">
        <input id="remember_me" type="checkbox"
          class="rounded border-slate-600 bg-slate-900 text-indigo-600 shadow-sm focus:ring-indigo-500 focus:ring-offset-slate-800"
          name="remember">
        {{-- <span
          class="ms-2 text-sm text-slate-400 group-hover:text-white transition-colors">{{ __('Remember me') }}</span> --}}
      </label>
    </div>

    <button type="submit"
      class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-500/50 font-medium rounded-lg text-sm px-5 py-3 text-center shadow-lg shadow-indigo-500/30 transition-all transform hover:-translate-y-0.5">
      {{ __('Log in') }}
    </button>

    <p class="text-sm font-light text-slate-400 text-center pt-2">
      Don't have an account yet?
      <a href="{{ route('register') }}"
        class="font-medium text-indigo-400 hover:text-indigo-300 hover:underline transition-colors">
        Sign up here
      </a>
    </p>
  </form>
</x-guest-layout>
