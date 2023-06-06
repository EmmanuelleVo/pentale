<x-layout>
    <x-header.novel-header :book="$book" :book_genres="$book_genres" :book_tags="$book_tags" :book_average="$book_average" title="{{ $book->title }} - Pentale"/>
    <main id="main" class="novel" lang="{{ $book->language }}">
        <div class="header header--novel">
            <div class="o-wrapper header__container">
                <x-breadcrumbs.breadcrumb>
                        <x-breadcrumbs.breadcrumb-link title="Novels" link="/novels" index="2"/>
                        <x-breadcrumbs.breadcrumb-separator/>
                    <x-breadcrumbs.breadcrumb-link :title="\Illuminate\Support\Str::limit($book->title, 40, $end='...')" link="/novels/{{ $book->slug }}" index="3"/>
                </x-breadcrumbs.breadcrumb>
                <div class="novel__info header__wrapper">
                    <figure class="novel__info-figure header__figure">
                        <img src="{{ $book->cover }}" alt="Cover of {{ $book->title }}" class="novel__info-img header__img">
                    </figure>
                    <div class="novel__info-wrapper header__content">
                        <div class="novel__info-container">
                            <h2 aria-level="2" role="heading" class="title title--section title--page">{{ $book->title }}</h2>
                            <dl class="novel__info-meta meta__container">
                                <x-commons.meta-image name="Views count" attribute="{{ \App\Helpers\Helper::convert($view_count) }} views">
                                    <x-svg.star/>
                                </x-commons.meta-image>
                                <x-commons.meta-image name="Chapters count" attribute="{{ count($book->chapters()->get()) }} chapters">
                                    <x-svg.chapter/>
                                </x-commons.meta-image>
                                <x-commons.meta-image name="Reviews count" attribute="{{ count($book->reviews()->get()) }} reviews">
                                    <x-svg.review/>
                                </x-commons.meta-image>
                            </dl>
                            <div id="starContainer" class="novel__info-stars">
                                <div class="star__container">
                                    <i class='bx bx-star star' style="--i: 1;"></i>
                                    <i class='bx bx-star star' style="--i: 2;"></i>
                                    <i class='bx bx-star star' style="--i: 3;"></i>
                                    <i class='bx bx-star star' style="--i: 4;"></i>
                                    <i class='bx bx-star star' style="--i: 5;"></i>
                                </div>
                                <span class="book__average">{{ $book_average }}</span>
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
                            @livewire('bookmark', [$book])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="o-wrapper" x-data="{ tab: window.location.hash ? window.location.hash : '#about' }">
            <div class="tab">
                <a id="tabLink" href="#about"
                   @click="tab='#about'"
                   :class="{[tab==='#about']: 'tab__link--active'}"
                   class="tab__link"> About
                </a>
                <a id="tabLink" href="#chapters"
                   @click="tab='#chapters'"
                   :class="{[tab==='#chapters']: 'tab__link--active'}"
                   class="tab__link"> Chapters
                </a>
                <a id="tabLink" href="#reviews"
                   @click="tab='#reviews'"
                   :class="{[tab==='#reviews']: 'tab__link--active'}"
                   class="tab__link"> Reviews
                </a>
                {{--<x-commons.tab @click="tab='#about'"
                               --}}{{--class="tab__link--active"--}}{{--
                               --}}{{--:class="tab === '#about' ? 'tab__link--active' : ''"--}}{{--
                               link="#about" name="About"/>
                <x-commons.tab @click="tab='#chapters'" link="#chapters" name="Chapters"/>
                <x-commons.tab @click="tab='#reviews'" link="#reviews" name="Reviews"/>--}}
            </div>

            <section x-show="tab === '#about'" x-cloak id="About" class="tab__content tab__content--active">
                <x-novel.tab-about :synopsis="$book->synopsis" patreon__link="#" :books="$other_books"/>
            </section>
            <section x-show="tab === '#chapters'" x-cloak id="Chapters" class="tab__content">
                <livewire:chapter-index :book="$book"/>
            </section>
            <section x-show="tab === '#reviews'" x-cloak id="Reviews" class="tab__content">
                <x-novel.tab-reviews :reviews="$book_reviews" :book="$book"/>
            </section>
        </div>

    </main>
    <x-footer.footer/>
</x-layout>
