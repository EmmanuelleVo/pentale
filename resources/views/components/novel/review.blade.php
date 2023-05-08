@props(['review'])

<li class="reviews__item review">
    <div class="review__container review__container--header">
        <figure class="review__figure avatar">
            <img src="{{ $review->user->avatar }}" alt="'s avatar" class="review__img">
        </figure>

        <div class="review__stars form">
            <x-commons.stars title="Writing quality"/>
            <x-commons.stars title="Story development"/>
            <x-commons.stars title="Characters"/>
            <x-commons.stars title="Overall"/>
        </div>
    </div>

    <div class="review__container">
        <div class="review__header">
            <span class="title title--small">{{ $review->user->name }}</span>
            <time class="review__date"
                  datetime="{{ $review->published_at }}">{{ \Carbon\Carbon::parse($review->published_at)->diffForHumans() }}</time>
        </div>
        <div class="wysiwyg review__content">
            {{ $review->body }}
        </div>
        <div class="review__actions">
            <div class="review__likes">
                <x-commons.button-img link="#" title="Like the review">
                    <x-svg.like/>
                    <span>{{ $review->likes }}</span>
                </x-commons.button-img>
                <x-commons.button-img link="#" title="Dislike the review">
                    <x-svg.dislike/>
                    <span>{{ $review->dislikes }}</span>
                </x-commons.button-img>
            </div>
            <div class="reviews__report">
                <x-commons.button-img link="#" title="Report the review">
                    <x-svg.report/>
                    <span>Report</span>
                </x-commons.button-img>
            </div>
        </div>
    </div>
</li>
