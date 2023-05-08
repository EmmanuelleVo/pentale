@props(['name', 'link'])

<a id="tabLink" href="{{ $link }}"  data-id="{{ $name }}"
    {{ $attributes->merge(['class' => 'tab__link']) }}

>
    {{ $name }}
</a>
