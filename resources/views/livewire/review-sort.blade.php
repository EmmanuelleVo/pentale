<div class="novel__reviews reviews">
    <div class="reviews__header">
            <span
                class="title title--small">{{ $book->reviews()->count() }} {{ $book->reviews()->count() > 1 ? 'reviews' : 'review' }}
            </span>
        <div class="reviews__actions tags">
            <div class="tags__list" x-data="{ activeButton: ''}">
                {{--<x-commons.filter-tag class="tags__link--filter--active" name="Popular" link="#"/>--}}
                <button wire:click="sortBy('likes', 'DESC')"
                        class="tags__link tags__link--filter"
                        {{--:class="{'tags__link--filter--active' : $classActive === true}"--}}>
                    Popular
                </button>
                <button wire:click="sortBy('created_at', 'DESC')" class="tags__link tags__link--filter">
                    Newest
                </button>
                <button wire:click="sortBy('created_at', 'ASC')"
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
