<x-layout>
    <x-header.home-header title="Home - Pentale"/>
    <main id="main">
        <section class="header header--home">
            <div class="o-wrapper">
                <div class="header__container">
                    <noscript>
                        <div id="js-disabled-message">
                            <p>Please enable JavaScript in your browser to fully experience this website.</p>
                        </div>
                    </noscript>
                    <h2 aria-level="2" role="heading" class="title title--big title--black">
                        Read and write novels on <span class="colored">Pentale</span>
                    </h2>
                    <div class="header__wrapper">
                        <figure class="header__figure">
                            <img src="img/header.jpg" alt="header image" class="header__img">
                        </figure>
                        <div class="header__content wysiwyg">
                            <div class="header__content--container">
                                <span class="title title--small">Best place for authors</span>
                                <p>Create a story and publish it.</p>
                                <p>Interact with our community to get feedback and support from the books you made.</p>
                            </div>
                            <div class="header__content--container">
                                <span class="title title--small">Best place for readers</span>
                                <p>Read the best novels the authors created.</p>
                                <p>Interact with the author of your favorite novels and with other readers.</p>
                                <p>Bookmark the stories you love so you don’t miss the updates.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="o-wrapper">
            <section class="home__updates">
                <div class="home__updates-container title-container">
                    <x-titles.section-title title="Latest Releases"/>
                    <x-commons.button link="/novels?sort=latest-releases" title="View all latest releases">View all</x-commons.button>
                </div>

                <div class="home__updates-list swiper">
                    <div class="swiper-wrapper">
                        @foreach($latestReleases as $latestRelease)
                            <x-cards.latest-release :book="$latestRelease"/>
                        @endforeach
                    </div>
                    <button aria-label="Previous slide" class="swiper-button-prev"></button>
                    <button aria-label="Next slide" class="swiper-button-next"></button>
                </div>

            </section>
        </div>

        <div class="home__container o-wrapper">
            <section class="home__ranking">
                <div class="home__updates-container title-container">
                    <x-titles.section-title title="Popular novels"/>
                    <x-commons.arrow-link title="View all popular novels" link="/novels?sort=popular">View all</x-commons.arrow-link>
                </div>
                <div class="card-list--small">
                    @foreach($popularBooks as $popularBook)
                            <x-cards.novel-small :book="$popularBook"/>
                    @endforeach
                </div>

            </section>

            <section class="home__ranking">
                <div class="home__updates-container title-container">
                    <x-titles.section-title title="newest novels"/>
                    <x-commons.arrow-link title="View all newest novels" link="/novels?sort=newest-novels">View all</x-commons.arrow-link>
                </div>
                <div class="card-list--small">
                    @foreach($latestBooks as $latestBook)
                        <x-cards.novel-small :book="$latestBook"/>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>
