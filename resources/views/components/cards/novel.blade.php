@props(['book', 'title', 'img_link', 'link', 'chapter_number', 'chapter_link', 'chapter_time'])

<div class="novel__item swiper-slide">
    <figure class="novel__item-figure">
        <a href="/novels/{{ $book->slug }}" class="u-absolute" title="Learn more about {{ $book->title }}"></a>
        <img src="{{ $book->cover }}" alt="" class="novel__item-img">
    </figure>
    <div class="novel__item-content">
        <h3 class="title title--card" aria-level="3" role="heading">
            <a href="/novels/{{ $book->slug }}" title="Learn more about {{ $book->title }}">{{ $book->title }}</a>
        </h3>
        @foreach($book->chapters()->paginate(2) as $chapter)
            <div class="novel__chapter">
                <a href="/novels/{{ $book->slug }}/chapter-{{ $chapter->chapter_number }}" class="link" title="Read new chapter">
                    Chapter {{ $chapter->chapter_number }}
                </a>
                <time class="novel__chapter-date" datetime="{{ $chapter->published_at }}">{{ \Carbon\Carbon::parse($chapter->published_at)->diffForHumans() }}</time>
            </div>
        @endforeach
    </div>
</div>
