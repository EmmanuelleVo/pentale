@props(['book'])

<div class="novel__item swiper-slide">
    <figure class="novel__item-figure">
        <a href="/novels/{{ $book->slug }}" class="u-absolute" title="Learn more about {{ $book->title }}"></a>
        <img src="{{ $book->cover }}" alt="Cover of {{ $book->title }}" class="novel__item-img">
    </figure>
    <div class="novel__item-content">
        <h3 class="title title--card" aria-level="3" role="heading">
            <a href="/novels/{{ $book->slug }}" title="Learn more about {{ $book->title }}">
                {{ \Illuminate\Support\Str::limit($book->title, 40, $end='...') }}
            </a>
        </h3>
        <div class="novel__chapter">
            <a href="/novels/{{ $book->slug }}/chapter-{{ $book->chapters()->latest('published_at')->first()->chapter_number }}" class="link" title="Read new chapter">
                Chapter {{ $book->chapters()->latest('published_at')->first()->chapter_number }}
            </a>
            <time class="novel__chapter-date" datetime="{{ $book->chapters()->latest('published_at')->first()->published_at }}">{{ \Carbon\Carbon::parse($book->chapters()->latest('published_at')->first()->published_at)->diffForHumans() }}</time>
        </div>
    </div>
</div>
