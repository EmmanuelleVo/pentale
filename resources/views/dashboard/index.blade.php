<x-layout>
    <x-header.dashboard-header title="My dashboard - Pentale"/>
    <main id="main" class="dashboard">
        <div class="o-wrapper">
            <section class="dashboard__stories">
                <div class="dashboard__stories-container title-container">
                    <x-titles.section-title title="My stories"/>
                    <x-commons.arrow-link link="{{ route('novel.index') }}" title="View all stories">View all</x-commons.arrow-link>
                </div>
                <div class="dashboard__stories-list card-list">
                    @foreach($books as $book)
                        <x-cards.dashboard.story :book="$book"/>
                    @endforeach
                </div>
            </section>

            <div class="dashboard__container">
                <section class="dashboard__reviews">
                    <div class="dashboard__reviews-container title-container">
                        <x-titles.section-title title="Latest reviews"/>
                        <x-commons.arrow-link link="{{ route('novel.index') }}" title="View all latest reviews">See more</x-commons.arrow-link>
                    </div>
                    <div class="dashboard__reviews-list">
                        @foreach($latestReviews as $latestReview)
                            <x-cards.dashboard.review-card :review="$latestReview"/>
                        @endforeach
                    </div>

                </section>

                <section class="dashboard__comments">
                    <div class="dashboard__comments-container title-container">
                        <x-titles.section-title title="Latest comments"/>
                        <x-commons.arrow-link link="{{ route('novel.index') }}" title="View all latest comments">See more</x-commons.arrow-link>
                    </div>

                </section>
            </div>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










