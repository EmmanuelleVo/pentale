@props(['book'])

<div class="story story__item">
    <figure class="story__item-figure">
        <img src="{{ $book->cover }}" alt="Cover of {{ $book->title }}" class="story__item-img">
    </figure>
    <div class="story__item-content">
        <h3 class="title title--card" aria-level="3" role="heading">{{ $book->title }}</h3>
        <div class="story__item-meta meta">
            <x-commons.meta-text-dashboard number="{{ $book->chapters()->count() }}" term="Chapters"/>
            <x-commons.meta-text-dashboard number="{{ round($book->reviews()->avg('overall'), 2) }}" term="Rating"/>
            <x-commons.meta-text-dashboard number="{{ \App\Helpers\Helper::convert($book->chapters()->sum('views')) }}" term="Views"/>
            <x-commons.meta-text-dashboard number="{{ $book->reviews()->count() }}" term="Reviews"/>
            <x-commons.meta-text-dashboard number="194K" term="Words"/>
        </div>
        <div class="actions">
            <x-commons.button title="Create new chapter" link="/dashboard/novels/{{ $book->slug }}/create">New chapter</x-commons.button>
            <x-commons.button class="c-btn--secondary" title="View details" link="/dashboard/novels/{{ $book->slug }}">Details</x-commons.button>
        </div>
    </div>
</div>
