@props(['chapter'])

<div class="novel__item swiper-slide">
    <figure class="novel__item-figure">
        <a href="/novels/{{ $chapter->book->slug }}" class="u-absolute" title="Learn more about {{ $chapter->book->title }}"></a>
        <img src="{{ $chapter->book->cover }}" alt="" class="novel__item-img">
    </figure>
    <div class="novel__item-content">
        <h3 class="title title--card" aria-level="3" role="heading">
            <a href="/novels/{{ $chapter->book->slug }}" title="Learn more about {{ $chapter->book->title }}">
                {{ \Illuminate\Support\Str::limit($chapter->book->title, 40, $end='...') }}
            </a>
        </h3>
        <div class="novel__chapter">
            <a href="/novels/{{ $chapter->book->slug }}/chapter-{{ $chapter->chapter_number }}" class="link" title="Read new chapter">
                Chapter {{ $chapter->chapter_number }}
            </a>
            <time class="novel__chapter-date" datetime="{{ $chapter->published_at }}">{{ \Carbon\Carbon::parse($chapter->published_at)->diffForHumans() }}</time>
        </div>
        {{--@foreach($book->chapters()->paginate(2) as $chapter)
            <div class="novel__chapter">
                <a href="/novels/{{ $book->book_slug }}/chapter-{{ $chapter->chapter_number }}" class="link" title="Read new chapter">
                    Chapter {{ $chapter->chapter_number }}
                </a>
                <time class="novel__chapter-date" datetime="{{ $chapter->published_at }}">{{ \Carbon\Carbon::parse($chapter->published_at)->diffForHumans() }}</time>
            </div>
        @endforeach--}}
    </div>
</div>
