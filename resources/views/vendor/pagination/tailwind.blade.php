@php
    $classes = [
        'relative inline-flex items-center lg:size-12 size-8  justify-center lg:text-xl font-medium bg-mine-100 text-white', //active
        'relative inline-flex items-center lg:size-12 size-8  justify-center lg:text-xl font-medium bg-white text-mine-100 hover:bg-mine-100 hover:text-white transition duration-300'
    ]
@endphp


@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex items-center justify-center flex-1 mt-5">
            <div class="">
                <span class="relative z-0 inline-flex space-x-3 rounded-md shadow-sm rtl:flex-row-reverse">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="rounded-l-lg {{ $classes[0] }}" aria-hidden="true">
                                <i class='text-3xl bx bx-chevron-left' ></i>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class=" rounded-l-lg {{ $classes[1] }}" aria-label="{{ __('pagination.previous') }}">
                            <i class='text-3xl bx bx-chevron-left' ></i>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 cursor-default dark:bg-gray-800 dark:border-gray-600">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="{{ $classes[0] }}">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="{{ $classes[1] }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="rounded-r-lg {{ $classes[1] }}" aria-label="{{ __('pagination.next') }}">
                            <i class='text-3xl bx bx-chevron-right' ></i>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="rounded-r-lg {{ $classes[0] }}" aria-hidden="true">
                                <i class='text-3xl bx bx-chevron-right' ></i>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
