@props(['active'])
@php
    $classes =
        $active ?? false
            ? 'p-2 flex md:justify-start md:pl-5 justify-center items-center size-10 md:w-full cursor-pointer rounded-lg text-mine-100 bg-white transition duration-300'
            : 'p-2 flex md:justify-start md:pl-5 justify-center items-center size-10 md:w-full cursor-pointer rounded-lg bg-mine-100 text-white hover:text-mine-100 hover:bg-white transition duration-300';
@endphp

<a
    {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
