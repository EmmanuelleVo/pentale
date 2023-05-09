@props(['synopsis', 'patreon__link', 'books'])

<div class="novel__about">
    <div class="novel__about-container">
        <x-titles.small-title title="Synopsis"/>
        <div class="wysiwyg novel__about-synopsis">
            {!! $synopsis !!}
        </div>
    </div>

    <div class="novel__about-container">
        <x-titles.small-title title="Support the author"/>
        <a href="{{ $patreon__link }}" title="Go to patreon to support the author" class="">
            <x-svg.patreon/>
        </a>
    </div>

    <div class="novel__about-container">
        <div class="home__updates-container title-container">
            <x-titles.small-title title="Novels of the same genre"/>
            <x-commons.button link="#" title="View other novels of the same genre">View all</x-commons.button>
        </div>
        <ul class="novel__about-list">
            @foreach($books as $book)
                <li class="novel__about-item">
                    @dd($books)
                    <x-cards.novel :title="$book->title"
                                   :img_link="$book->cover"
                                   link="/novels/{{ $book->slug }}"
                                   :chapter_number="$book->chapter_number"
                                   chapter_link="/novels/{{ $book->slug }}/chapter-{{ $latestRelease->chapter_number }}"
                    />
                </li>
            @endforeach
        </ul>
    </div>

</div>
