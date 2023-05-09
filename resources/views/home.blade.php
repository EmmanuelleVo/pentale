<x-layout>
    <x-header.home-header title="Home - Pentale"/>
    <main id="main">
        <div class="o-wrapper">
            <section class="home__updates">
                <div class="home__updates-container title-container">
                    <x-titles.section-title title="Latest Releases"/>
                    <x-commons.button link="{{ route('novel.index') }}" title="View all latest releases">View all</x-commons.button>
                </div>

                <div class="home__updates-list card-list">
                    @foreach($latestReleases as $latestRelease)
                        <x-cards.novel :title="$latestRelease->title"
                                       :img_link="$latestRelease->book->cover"
                                       link="/novels/{{ $latestRelease->book->slug }}"
                                       :chapter_number="$latestRelease->chapter_number"
                                       chapter_link="/novels/{{ $latestRelease->book->slug }}/chapter-{{ $latestRelease->chapter_number }}"
                                       :chapter_time="$latestRelease->published_at"
                        />
                    @endforeach
                </div>

            </section>
        </div>

        <section class="home__ranking">
            <div class="home__updates-container title-container">
                <x-titles.section-title title="Popular novels"/>
                <x-commons.arrow-link title="View all popular novels" link="/novels">View all</x-commons.arrow-link>
            </div>

        </section>

        <section class="home__ranking">
            <div class="home__updates-container title-container">
                <x-titles.section-title title="newest novels"/>
                <x-commons.arrow-link title="View all newest novels" link="/novels">View all</x-commons.arrow-link>
            </div>

        </section>
    </main>
    <x-footer.footer/>
</x-layout>
