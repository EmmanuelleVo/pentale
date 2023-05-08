@props(['title', 'link', 'chapter_number', 'date'])

<div class="chapter__item">
    <a href="{{ $link }}" class="u-absolute" title="Read chapter {{ $title }}"></a>
    <span class="chapter__number">{{ $chapter_number }}</span>
    <div class="chapter__item-content">
        <span class="chapter__title">{{ $title }}</span>
        <span class="chapter__date">
            <time datetime="{{ $date }}">{{ $date }}</time>
        </span>
    </div>
</div>
