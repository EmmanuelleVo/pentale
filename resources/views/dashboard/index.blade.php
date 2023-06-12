<x-layout>
    <x-header.dashboard-home-header title="My dashboard - Pentale"/>
    <main id="main" class="dashboard">
        <div class="o-wrapper">
            <section class="dashboard__stories">
                <div class="dashboard__stories-container title-container">
                    <x-titles.section-title title="My stories"/>
                    @if(count($books) > 1)
                        <x-commons.arrow-link link="{{ route('dashboard.novels') }}" title="View all stories">View all</x-commons.arrow-link>
                    @endif
                </div>
                <div class="dashboard__stories-list card-list">
                    @if(count($books) > 1)
                        @foreach($books as $book)
                            <x-cards.dashboard.story :book="$book"/>
                        @endforeach

                        @else
                        <x-commons.no-collection>{{ __('You don\'t have any story yet.') }}</x-commons.no-collection>
                    @endif

                </div>
            </section>

            <div class="dashboard__container">
                <section class="dashboard__reviews">
                    <div class="dashboard__reviews-container title-container">
                        <x-titles.section-title title="Latest reviews"/>
                        @if(count($latestReviews) > 1)
                        <x-commons.arrow-link link="{{ route('dashboard.reviews') }}" title="View all latest reviews">See more</x-commons.arrow-link>
                        @endif
                    </div>
                    <div class="dashboard__reviews-list">
                        @if(count($latestReviews) > 1)
                            @foreach($latestReviews as $latestReview)
                                <x-cards.dashboard.review-card :review="$latestReview"/>
                            @endforeach
                        @else
                            <x-commons.no-collection>{{ __('There are no review yet.') }}</x-commons.no-collection>
                        @endif
                    </div>

                </section>

                <section class="dashboard__comments">
                    <div class="dashboard__comments-container title-container">
                        <x-titles.section-title title="Latest comments"/>
                        @if(count($latestReviews) > 1)
                            <x-commons.arrow-link link="{{ route('dashboard.comments') }}" title="View all latest comments">See more</x-commons.arrow-link>
                        @else
                            <x-commons.no-collection>{{ __('There are no comment yet.') }}</x-commons.no-collection>
                        @endif
                    </div>

                </section>
            </div>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










