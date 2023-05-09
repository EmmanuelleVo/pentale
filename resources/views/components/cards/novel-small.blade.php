@props(['title', 'img_link', 'link', 'chapter_number', 'chapter_link', 'chapter_time'])

<div class="novel__item novel__item--small">
    <a href="{{ $link }}" title="Learn more about {{$title}}" class="u-absolute"></a>
    <figure class="novel__item-figure">
        <a href="{{ $link }}" class="u-absolute" title="Learn more about {{$title}}"></a>
        <img src="{{ $img_link }}" alt="" class="novel__item-img">
    </figure>
    <div class="novel__item-content">
        <h3 class="title title--card" aria-level="3" role="heading">{{$title}}</h3>
        {{--TODO: ADD STARS--}}
        <div class="novel__item-genres genres">
            <span class="u-visually-hidden">Genres :</span>
            <ul class="genres__list">
                @foreach($book->genres()->orderBy('name')->paginate(3) as $book_genre)
                    <li class="genres__item">
                        <a href="#" class="genres__link">
                            <x-commons.tag name="{{ $book_genre->name }}"/>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
