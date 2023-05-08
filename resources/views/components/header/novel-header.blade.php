@props(['book', 'book_genres', 'book_tags', 'book_average'])

<header class="header header--novel">
    <h1 aria-level="1" role="heading" class="u-visually-hidden">{{ $title ?? 'Novel - Pentale' }}</h1>
    <x-navigation.navigation/>

    <div class="o-wrapper header__container">
        <div class="novel__info header__wrapper">
            <figure class="novel__info-figure header__figure">
                <img src="{{ $book->cover }}" alt="Cover of {{ $book->title }}" class="novel__info-img header__img">
            </figure>
            <div class="novel__info-wrapper header__content">
                <div class="novel__info-container">
                    <h2 aria-level="2" role="heading" class="title title--section title--page">{{ $book->title }}</h2>
                    <dl class="novel__info-meta meta__container">
                        <x-commons.meta-image name="Views count" attribute="1.1M views"></x-commons.meta-image>
                        <x-commons.meta-image name="Chapters count" attribute="298 chapters"></x-commons.meta-image>
                        <x-commons.meta-image name="Reviews count" attribute="29 reviews"></x-commons.meta-image>
                    </dl>
                    <div class="novel__info-stars">
                        <div class="star__container">
                            <i class='bx bx-star star' style="--i: 1;"></i>
                            <i class='bx bx-star star' style="--i: 2;"></i>
                            <i class='bx bx-star star' style="--i: 3;"></i>
                            <i class='bx bx-star star' style="--i: 4;"></i>
                            <i class='bx bx-star star' style="--i: 5;"></i>
                        </div>
                        <span>{{ $book_average }}</span>
                    </div>
                    <dl class="novel__info-meta tags__container">
                        <x-commons.meta-text name="Author" attribute="{{ $book->user->username }}"/>
                        <x-commons.meta-text name="Editor" attribute="editor123"/>
                    </dl>
                    <div class="novel__info-genres genres">
                        <span class="title title--small">Genre</span>
                        <ul class="genres__list">
                            @foreach($book_genres as $book_genre)
                                <li class="genres__item">
                                    <a href="#" class="genres__link">
                                        <x-commons.tag name="{{ $book_genre->name }}"/>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="novel__info-tags tags tags__container">
                        <span class="title title--small">Tags</span>
                        <ul class="tags__list">
                            @foreach($book_tags as $book_tag)
                                <li class="tags__item">
                                    <a href="#" class="tags__link">
                                        <x-commons.tag name="{{ $book_tag->name }}"/>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="novel__info-actions">
                    <x-commons.button link="/novels/{{ $book->slug }}/chapter-1" title="Read first chapter">Start reading</x-commons.button>
                    <x-commons.button class="c-btn--secondary" link="#" title="Bookmark {{ $book->title }}">Bookmark</x-commons.button>
                </div>
            </div>
        </div>
    </div>
</header>
