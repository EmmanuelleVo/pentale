@props(['link', 'title'])

<a href="{{ $link }}"
   {{ $attributes->merge(['class' => 'c-btn c-btn--secondary']) }}
   title="{{ $title }}">
    {{ $slot }}
</a>

