<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="pt-18">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="pb-4 lg:pt-4 lg:pb-4">
        <div class="text-gray-900">
          <x-posts.table :posts='$posts' />
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
