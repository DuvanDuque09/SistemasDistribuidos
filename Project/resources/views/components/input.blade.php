@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        ($disabled
            ? 'bg-gray-50 border-none text-gray-500 cursor-not-allowed'
            : 'border-gray-300 focus:border-red-500 focus:ring-red-500') . ' rounded-md shadow-sm',
]) !!}>
