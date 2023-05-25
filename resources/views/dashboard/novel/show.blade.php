<x-layout>
    <x-header.dashboard-header title="{{ $page_title }} - Pentale"/>
    <main id="main" class="dashboard">
        <div class="o-wrapper">
            <div class="novel__info">
                <div class="story story__item">
                    <figure class="story__item-figure">
                        <img src="{{ $book->cover }}" alt="" class="story__item-img">
                    </figure>
                    <div class="story__item-content">
                        <div class="title-container">
                            <h3 class="title title--card" aria-level="3" role="heading">{{ $book->title }}</h3>
                            <div class="dropdown">
                                <a href="#" class="dropdown__btn">...</a>
                                <div class="dropdown__container">
                                    <a href="/dashboard/novels/{{ $book->slug }}/edit" class="dropdown__link nav__sublink">
                                        <span class="nav__sublink__label">Edit</span>
                                    </a>
                                    <form action="/dashboard/novels/{{ $book->slug }}/destroy" method="post" class="form">
                                        @csrf
                                        <button class="nav__sublink">
                                            <span class="nav__sublink__label">Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="story__item-meta meta">
                            <x-commons.meta-text-dashboard number="10" term="Chapters"/>
                            <x-commons.meta-text-dashboard number="4.6" term="Rating"/>
                            <x-commons.meta-text-dashboard number="208.5K" term="Views"/>
                            <x-commons.meta-text-dashboard number="23" term="Reviews"/>
                            <x-commons.meta-text-dashboard number="194K" term="Words"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="novel__container">
                <div class="tab">
                    <x-commons.tab class="tab__link--active" link="#about" name="About"/>
                    <x-commons.tab link="#chapters" name="Chapters"/>
                    <x-commons.tab link="#details" name="Details"/>
                </div>

                <section id="About" class="tab__content tab__content--active">
                    <x-dashboard.tab-about :book="$book" :genres="$genres" :tags="$tags"/>
                </section>
                <section id="Chapters" class="tab__content">
                    <x-dashboard.tab-chapters :chapters="$chapters"/>
                </section>
                <section id="Details" class="tab__content">
                    <x-dashboard.tab-details :book="$book" :characters="$characters"/>
                </section>
            </div>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










