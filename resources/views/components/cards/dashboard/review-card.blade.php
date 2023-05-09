@props(['review'])

<div class="dashboard__card">
    <a href="/novels/{{ $comment->chapter->book->title }}#reviews" class="u-absolute" title="View the review"></a>
    <p class="dashboard__card-content">
        <span class="bold">{{ $review->user->username }}</span> has written a review on your novel {{ $review->book->title }}.
    </p>
    <time class="date" datetime="{{ $review->published_at }}">{{ $review->published_at->diffForHumans() }}</time>
</div>
