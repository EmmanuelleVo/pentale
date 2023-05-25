@props(['review'])

<div class="dashboard__card">
    <a href="/novels/{{ $review->book->slug }}#reviews" class="u-absolute" title="View the review"></a>
    <p class="dashboard__card-content">
        <span class="bold">{{ $review->user->username }}</span> has written a review on your novel <span class="bold">{{ $review->book->title }}</span>.
    </p>
    <time class="date" datetime="{{ $review->published_at }}">{{ \Carbon\Carbon::parse($review->published_at)->diffForHumans() }}</time>
</div>
