@props(['link', 'name'])

<div {{ $attributes->merge(['class' => 'nav__link-container']) }}>
    <a href="{{ $link }}" class="nav__link" title="Go to page {{ $name }}">
        <span class="nav__link__textWrapper navActive">
            {{ $slot }} {{ $name }}
        </span>
    </a>
</div>
