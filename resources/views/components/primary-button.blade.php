<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mt-4 font-pixel bg-yellow-400 border-2 border-black text-gray-900 px-6 py-2 rounded-md shadow-[4px_4px_0px_rgba(0,0,0,1)] hover:bg-violet-400 hover:scale-105 transition']) }}>
    {{ $slot }}
</button>
