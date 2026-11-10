@props(['href'])

@php
    $isActive = request()->is(ltrim($href, '/')) || (request()->is('/') && $href === '/');
    $classes = $isActive
        ? 'text-blue-600 font-semibold border-b-2 border-blue-600 pb-1'
        : 'text-gray-600 hover:text-blue-600 pb-1';
@endphp

<a href="{{ $href }}" class="{{ $classes }}">{{ $slot }}</a>
