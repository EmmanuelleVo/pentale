@props(['name'])

<div class="nav__link nav__link--dropdown dropdown">
    <a href="#" class="nav__link-dropdown dropdownBtn" title="Open dropdown" aria-haspopup="true" tabindex="0">
        <span class="nav__link__textWrapper">
            {{ $name }}
            <x-svg.arrow />
        </span>
    </a>
    <div class="nav__dropdown nav__dropdown--animated" aria-hidden="true" aria-label="submenu" tabindex="0">
        {{ $slot }}
    </div>
</div>

