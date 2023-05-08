@props(['link', 'title', 'index'])

<li itemprop="itemListElement" itemscope
    itemtype="https://schema.org/ListItem"
    class="breadcrumb__item">
    <a itemprop="item"
       href="{{ $link }}"
       {{ $attributes->merge(['class' => 'breadcrumb__link']) }}
       title="Go to page {{ $title }}">
        <span itemprop="name">{{ $title }}</span>
    </a>
    <meta itemprop="position" content="{{ $index }}" />
</li>
