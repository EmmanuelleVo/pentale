@props(['comment'])

<div class="dashboard__card">
    <a href="/novels/{{ $comment->chapter->book->slug }}/chapter-{{ $comment->chapter->chapter_number }}" class="u-absolute" title="View the comment"></a>
    <p class="dashboard__card-content">
        <span class="bold">{{ $comment->user->username }}</span> has written a comment on the chapter {{ $comment->chapter->title }} of your novel {{ $comment->chapter->book->title }}.
    </p>
    <time class="date" datetime="{{ $comment->published_at }}">{{ \Carbon\Carbon::parse($comment->published_at)->diffForHumans() }}</time>
</div>
