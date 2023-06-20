@props(['link', 'name'])

<a href="{{ $link }}" class="nav__sublink" title="Go to page {{ $name }}" role="menuitem" tabindex="0">
    <span class="nav__sublink__label">
        {{ $name }}
    </span>
</a>

