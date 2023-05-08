@props(['link', 'title'])

<a href="{{ $link }}"
   {{ $attributes->merge(['class' => 'c-btn c-btn--primary']) }}
   title="{{ $title }}">
    {{ $slot }}
</a>
