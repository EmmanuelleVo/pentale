@props(['name'])

<button aria-label="filter by {{ $name }}"
   {{ $attributes->merge(['class' => 'tags__link tags__link--filter']) }}
>
    {{ $name }}
</button>
