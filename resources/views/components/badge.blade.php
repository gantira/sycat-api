@props(['status'])

@php
switch ($status) {
    case 'published':
        $color = 'green';
        break;

    default:
        $color = 'gray';
        break;
}
@endphp

<span {{ $attributes->merge(['class' => 'px-2 inline-flex capitalize text-xs leading-5 font-semibold rounded-full bg-'.$color.'-100 text-'.$color.'-800']) }}>
    {{ $slot }}
</span>
