<div class="novel__chapters">
    <div class="novel__chapters-actions">
        <div class="novel__chapters-actions tags">
            <div class="tags__list">
                {{--<x-commons.filter-tag class="tags__link--filter--active" name="Newest" link="#"/>
                <x-commons.filter-tag name="Oldest" link="#"/>--}}
                <button wire:click="sortBy('published_at', 'DESC')" class="tags__link tags__link--filter">
                    Newest
                </button>
                <button wire:click="sortBy('published_at', 'ASC')"
                        class="tags__link tags__link--filter">
                    Oldest
                </button>
            </div>
        </div>
        <div class="novel__chapters-pagination">
            {{ $chapters->links() }}
        </div>
    </div>
    <ul class="novel__chapters-list">
        @foreach($chapters as $chapter)
            <li class="novel__chapters-item chapter">
                <a href="/novels/{{ $chapter->book->slug }}/chapter-{{ $chapter->chapter_number }}" class="u-absolute" title="Read chapter {{ $chapter->chapter_number }}"></a>
                <span class="chapter__number">Chapter {{ $chapter->chapter_number }}</span>
                <div class="chapter__container">
                    <span class="chapter__title">{{ $chapter->title }}</span>
                    <time class="chapter__date" datetime="{{ $chapter->published_at }}">{{ \Carbon\Carbon::parse($chapter->published_at)->diffForHumans() }}</time>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="novel__chapters-pagination">
        {{ $chapters->links() }}
    </div>
</div>
