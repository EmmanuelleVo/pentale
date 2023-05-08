@props(['link', 'name'])

<a href="{{ $link }}" title="filter by {{ $name }}"
   {{ $attributes->merge(['class' => 'tags__link tags__link--filter']) }}
>
    {{ $name }}
</a>
