@props(['name', 'link'])

<a href="{{ $link }}" data-id="{{ $name }}"
    {{ $attributes->merge(['class' => 'tab__link']) }}
>
    {{ $name }}
</a>
