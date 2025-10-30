{{-- <a {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:text-yellow-400 transform transition duration-150 hover:scale-105 ease-in-out active:text-yellow-400']) }}>{{ $slot }}</a> --}}

@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 text-violet-400'
            : 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:text-yellow-400 transform transition duration-150 hover:scale-105 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
