@props(['active'])
@php
    $classes =
        $active ?? false
            ? 'px-3 py-2 cursor-pointer rounded-2xl bg-mine-100 text-white transition duration-300'
            : 'px-3 py-2 cursor-pointer rounded-2xl bg-white text-mine-100 hover:bg-mine-100 hover:text-white transition duration-300';
@endphp

<a
    {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
