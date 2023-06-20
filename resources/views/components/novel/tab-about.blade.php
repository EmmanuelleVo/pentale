@props(['synopsis', 'patreon__link', 'books'])

<div class="novel__about">
    <div class="novel__about-container">
        <x-titles.small-title title="Synopsis"/>
        <div class="wysiwyg novel__about-synopsis" itemprop="description">
            {!! $synopsis !!}
        </div>
    </div>

    @if($patreon__link)
        <div class="novel__about-container">
            <x-titles.small-title title="Support the author"/>
            <a target="_blank" href="{{ $patreon__link }}" title="Go to patreon to support the author" class="">
                <x-svg.patreon/>
            </a>
        </div>
    @endif

    <div class="novel__about-container">
        <div class="home__updates-container title-container">
            <x-titles.small-title title="Novels of the same genre"/>
            <x-commons.button link="/novels?sort=popular" title="View other novels of the same genre">View all</x-commons.button>
        </div>
        <div class="novel__about-list swiper">
            <ul class="swiper-wrapper">
                @foreach($books[0] as $book)
                    <li class="novel__about-item swiper-slide">
                        <div class="novel__item">
                            <a href="/novels/{{ $book->slug }}" class="u-absolute" title="Learn more about {{ $book->title }}"></a>
                            <figure class="novel__item-figure">
                                <img src="{{ $book->cover }}" alt="Cover of {{ $book->title }}" class="novel__item-img">
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
                                    <span class="book__average">{{ \App\Helpers\Helper::convert($book->reviews()->avg('overall')) }}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
