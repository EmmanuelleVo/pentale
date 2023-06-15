<x-layout>
    <x-header.dashboard-header title="{{ $page_title }} - Pentale" :page_title="$book->title" :book="$book"/>
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
                            <div class="dropdown" x-data="{dropdownMenu: false}">
                                <button @click="dropdownMenu = ! dropdownMenu" class="dropdown__btn">...</button>

                                <div x-show="dropdownMenu" class="dropdown__container">
                                    <a href="/dashboard/novels/{{ $book->slug }}/edit"
                                         class="dropdown__link nav__sublink">
                                        <span class="nav__sublink__label">Edit</span>
                                    </a>
                                    <form action="/dashboard/novels/{{ $book->slug }}" method="POST"
                                          class="form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="nav__sublink">
                                            <span class="nav__sublink__label">Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="story__item-meta meta">
                            <x-commons.meta-text-dashboard number="{{ $book->chapters()->count() }}" term="Chapters"/>
                            <x-commons.meta-text-dashboard number="{{ round($book->reviews()->avg('overall'), 2) }}"
                                                           term="Rating"/>
                            <x-commons.meta-text-dashboard
                                number="{{ \App\Helpers\Helper::convert($book->chapters()->sum('views')) }}"
                                term="Views"/>
                            <x-commons.meta-text-dashboard number="{{ $book->reviews()->count() }}" term="Reviews"/>
                            <x-commons.meta-text-dashboard number="{{ ucfirst($book->status) }}" term="Status"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="novel__container" x-data="{ tab: window.location.hash ? window.location.hash : '#about' }">
                <div class="tab">
                    {{--<x-commons.tab class="tab__link--active" link="#about" name="About"/>
                    <x-commons.tab link="#chapters" name="Chapters"/>
                    <x-commons.tab link="#details" name="Details"/>--}}
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
                    {{--<a id="tabLink" href="#details"
                       @click="tab='#details'"
                       :class="{[tab==='#details']: 'tab__link--active'}"
                       class="tab__link"> Details
                    </a>--}}
                </div>

                <section x-show="tab === '#about'" x-cloak id="About" class="tab__content tab__content--active">
                    <x-dashboard.tab-about :book="$book" :genres="$genres" :tags="$tags"/>
                </section>
                <section x-show="tab === '#chapters'" x-cloak id="Chapters" class="tab__content">
                    <livewire:dashboard.chapter-index :book="$book"/>
                </section>
                {{--<section x-show="tab === '#details'" x-cloak id="Details" class="tab__content">
                    <x-dashboard.tab-details :book="$book" :characters="$characters"/>
                </section>--}}
            </div>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










