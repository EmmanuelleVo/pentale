@props(['title', 'img_link', 'link', 'chapter_number', 'chapter_link', 'chapter_time'])

<div class="novel__item">
    <figure class="novel__item-figure">
        <a href="{{ $link }}" class="u-absolute" title="Learn more about {{$title}}"></a>
        <img src="{{ $img_link }}" alt="" class="novel__item-img">
    </figure>
    <div class="novel__item-content">
        <h3 class="title title--card" aria-level="3" role="heading">
            <a href="{{ $link }}" title="Learn more about {{$title}}">{{ $title }}</a>
        </h3>
        <div class="novel__chapter">
            <a href="{{ $chapter_link }}" class="link" title="Read new chapter">
                Chapter {{ $chapter_number }}
            </a>
            <time class="novel__chapter-date" datetime="{{ $chapter_time }}">{{ \Carbon\Carbon::parse($chapter_time)->diffForHumans() }}</time>
        </div>
        {{--TODO: ADD STARS--}}
    </div>
</div>
