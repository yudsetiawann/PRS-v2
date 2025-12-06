<x-app-layout>
  <div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="overflow-hidden shadow-xs sm:rounded-lg">
        <div class="text-gray-900">
            <x-posts.show :post='$post' />
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
