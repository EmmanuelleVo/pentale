@props(['book'])

<div class="novel__item novel__item--small">
    <a href="/novels/{{ $book->slug }}" title="Learn more about {{ $book->title }}" class="u-absolute"></a>
    <figure class="novel__item-figure">
        <img src="{{ $book->cover }}" alt="Cover of {{ $book->title }}" class="novel__item-img">
    </figure>
    <div class="novel__item-content">
        <div class="novel__info-stars starContainer">
            <div class="star__container">
                <i class='bx bx-star star' style="--i: 1;"></i>
                <i class='bx bx-star star' style="--i: 2;"></i>
                <i class='bx bx-star star' style="--i: 3;"></i>
                <i class='bx bx-star star' style="--i: 4;"></i>
                <i class='bx bx-star star' style="--i: 5;"></i>
            </div>
            <span class="book__average">{{ \App\Helpers\Helper::convert($book->reviews()->avg('overall')) }}</span>
        </div>
        <h3 class="title title--card" aria-level="3" role="heading">{{ $book->title }}</h3>
        <div class="novel__item-genres genres">
            <span class="u-visually-hidden">Genres :</span>
            <ul class="genres__list">
                @foreach($book->genres()->orderBy('name')->paginate(3) as $book_genre)
                    <li class="genres__item">
                        <a href="#" class="genres__link genres__link--filter" title="List novels with the genre {{ $book_genre->name }}">
                            <x-commons.tag name="{{ $book_genre->name }}"/>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
