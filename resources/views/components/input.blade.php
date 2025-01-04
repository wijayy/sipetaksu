@props(['id', 'type' => 'text', 'error' => "", 'required' => 1, 'old' => '', 'readonly' => 0])

<div class="flex items-center w-full h-10 mt-3 bg-gray-200 rounded-full">
    <label class="w-1/4 text-center" for="{{ $id }}">{{ $slot }}</label>
    <input class="w-3/4 bg-gray-200 border-none rounded-r-full" type="{{ $type }}" name="{{ $id }}" id="{{ $id }}" value="{{ old($id, $old) }}"
        @required($required) @readonly($readonly)>
</div>
@if (!is_null($error))
    <div class="px-3 mt-1 text-sm text-rose-500">{{ $error }}</div>
@endif
