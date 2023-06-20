@props(['link', 'title'])

<a href="{{ $link }}" {{ $attributes->merge(['class' => 'link link--arrow']) }} title="{{ $title }}">
    <span class="textWrapper">
        {{ $slot }}
    </span>
    <x-svg.arrow-link/>
</a>
