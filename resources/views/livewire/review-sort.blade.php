<div class="novel__reviews reviews" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
    <div class="reviews__header">
            <span itemprop="reviewCount"
                class="title title--small">{{ $book->reviews()->count() }} {{ $book->reviews()->count() > 1 ? 'reviews' : 'review' }}
            </span>
        <div class="reviews__actions tags">
            <div class="tags__list" x-data="{ activeButton: 'likes'}">
                <button wire:click="sortBy('likes', 'DESC')"
                        x-on:click="activeButton = 'likes'"
                        role="button"
                        :class="{ 'c-btn--active': activeButton === 'likes', '': activeButton !== 'likes' }"
                        class="tags__link tags__link--filter">
                    Popular
                </button>
                <button wire:click="sortBy('created_at', 'DESC')"
                        x-on:click="activeButton = 'desc'"
                        role="button"
                        :class="{ 'c-btn--active': activeButton === 'desc', '': activeButton !== 'desc' }"
                        class="tags__link tags__link--filter">
                    Newest
                </button>
                <button wire:click="sortBy('created_at', 'ASC')"
                        x-on:click="activeButton = 'asc'"
                        role="button"
                        :class="{ 'c-btn--active': activeButton === 'asc', '': activeButton !== 'asc' }"
                        class="tags__link tags__link--filter">
                    Oldest
                </button>
            </div>
        </div>
    </div>
    <div class="reviews__wrapper">
        <ul class="reviews__list">
            @foreach($reviews as $review)
                <x-novel.review :review="$review"/>
            @endforeach
        </ul>

        {{ $reviews->links() }}
    </div>
</div>
