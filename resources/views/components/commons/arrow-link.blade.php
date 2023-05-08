@props(['link', 'title'])

<a href="{{ $link }}" class="link link--arrow" title="{{ $title }}">
    <span class="textWrapper">
        {{ $slot }}
    </span>
    <x-svg.arrow-link/>
</a>
