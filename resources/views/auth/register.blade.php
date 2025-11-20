<x-guest-layout>
  <div class="mb-6 text-center">
    <h2 class="text-2xl font-bold text-white">Create Account</h2>
    <p class="text-slate-400 text-sm mt-1">Join the community and start writing</p>
  </div>

  <form method="POST" action="{{ route('register') }}" class="space-y-4">
    @csrf

    <div>
      <label for="name" class="block mb-2 text-sm font-medium text-slate-300">Full Name</label>
      <input id="name"
        class="bg-slate-900/50 border border-slate-600 text-white text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 placeholder-slate-500 transition-colors"
        type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
        placeholder="John Doe" />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div>
      <label for="username" class="block mb-2 text-sm font-medium text-slate-300">Username</label>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500">@</span>
        <input id="username"
          class="bg-slate-900/50 border border-slate-600 text-white text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-8 p-2.5 placeholder-slate-500 transition-colors"
          type="text" name="username" :value="old('username')" required autocomplete="username"
          placeholder="johndoe" />
      </div>
      <x-input-error :messages="$errors->get('username')" class="mt-2" />
    </div>

    <div>
      <label for="email" class="block mb-2 text-sm font-medium text-slate-300">Email Address</label>
      <input id="email"
        class="bg-slate-900/50 border border-slate-600 text-white text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 placeholder-slate-500 transition-colors"
        type="email" name="email" :value="old('email')" required autocomplete="username"
        placeholder="name@company.com" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div>
      <label for="password" class="block mb-2 text-sm font-medium text-slate-300">Password</label>
      <input id="password"
        class="bg-slate-900/50 border border-slate-600 text-white text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 placeholder-slate-500 transition-colors"
        type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div>
      <label for="password_confirmation" class="block mb-2 text-sm font-medium text-slate-300">Confirm Password</label>
      <input id="password_confirmation"
        class="bg-slate-900/50 border border-slate-600 text-white text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 placeholder-slate-500 transition-colors"
        type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="pt-2">
      <button type="submit"
        class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-500/50 font-medium rounded-lg text-sm px-5 py-3 text-center shadow-lg shadow-indigo-500/30 transition-all transform hover:-translate-y-0.5">
        {{ __('Register') }}
      </button>
    </div>

    <p class="text-sm font-light text-slate-400 text-center">
      Already have an account?
      <a href="{{ route('login') }}"
        class="font-medium text-indigo-400 hover:text-indigo-300 hover:underline transition-colors">Login here</a>
    </p>
  </form>
</x-guest-layout>
