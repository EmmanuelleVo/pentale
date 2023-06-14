@props(['synopsis', 'patreon__link', 'books'])

<div class="novel__about">
    <div class="novel__about-container">
        <x-titles.small-title title="Synopsis"/>
        <div class="wysiwyg novel__about-synopsis" itemprop="description">
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
        <ul class="novel__about-list swiper">
            <div class="swiper-wrapper">
                @foreach($books[0] as $book)
                    <li class="novel__about-item swiper-slide">
                        <div class="novel__item">
                            <a href="/novels/{{ $book->slug }}" class="u-absolute" title="Learn more about {{ $book->title }}"></a>
                            <figure class="novel__item-figure">
                                <img src="{{ $book->cover }}" alt="" class="novel__item-img">
                            </figure>
                            <div class="novel__item-content">
                                <h3 class="title title--card" aria-level="3" role="heading">
                                    {{ \Illuminate\Support\Str::limit($book->title, 30, $end='...') }}
                                </h3>
                                <div class="novel__info-stars starContainer">
                                    <div class="star__container">
                                        <i class='bx bx-star star' style="--i: 1;"></i>
                                        <i class='bx bx-star star' style="--i: 2;"></i>
                                        <i class='bx bx-star star' style="--i: 3;"></i>
                                        <i class='bx bx-star star' style="--i: 4;"></i>
                                        <i class='bx bx-star star' style="--i: 5;"></i>
                                    </div>
                                    <span class="book__average">0</span>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </div>
        </ul>
    </div>

</div>
