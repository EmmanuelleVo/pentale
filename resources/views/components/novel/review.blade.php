@props(['review'])

<li class="reviews__item review">
    <div class="review__container review__container--header">
        <figure class="review__figure avatar">
            <img src="{{ $review->user->avatar }}" alt="'s avatar" class="review__img">
        </figure>
        <div class="review__stars form">
            <x-commons.stars title="Writing quality" :number="$review->writing_quality"/>
            <x-commons.stars title="Story development" :number="$review->story_development"/>
            <x-commons.stars title="Characters" :number="$review->characters"/>
            <x-commons.stars title="Overall" :number="$review->overall"/>
        </div>
    </div>

    <div class="review__container">
        <div class="review__header">
            <a href="/profile/{{ $review->user->slug }}" title="View profile" class="title title--small">{{ $review->user->username }}</a>
            <time class="review__date"
                  datetime="{{ $review->published_at }}">{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</time>
        </div>
        <div class="wysiwyg review__content">
            {!! $review->body !!}
        </div>
        <div class="review__actions">
                @livewire('reactions', [$review])
            {{--<div class="review__likes">
                <x-commons.button-img link="#" title="Dislike the review">
                    <x-svg.dislike/>
                    <span>{{ $review->dislikes }}</span>
                </x-commons.button-img>
            </div>--}}
            <div class="reviews__report">
                <x-commons.button-img link="#" title="Report the review">
                    <x-svg.report/>
                    <span>Report</span>
                </x-commons.button-img>
            </div>
        </div>
    </div>
</li>
