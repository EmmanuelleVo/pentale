@props(['name'])

<div class="nav__link nav__link--dropdown">
    <a href="#" class="nav__link-dropdown" title="Open dropdown" aria-haspopup="true">
        <span class="nav__link__textWrapper">
            {{ $name }}
            <x-svg.arrow />
        </span>
    </a>
    <div class="nav__dropdown nav__dropdown--animated" aria-hidden="true" aria-label="submenu">
        {{ $slot }}
    </div>
</div>

