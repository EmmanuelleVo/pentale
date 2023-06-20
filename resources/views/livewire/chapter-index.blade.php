<div class="novel__chapters">
    <div class="novel__chapters-actions">
        <div class="novel__chapters-actions tags">
            <div class="tags__list" x-data="{ activeButton: 'desc'}">
                <button wire:click="sortBy('chapter_number', 'DESC')"
                        x-on:click="activeButton = 'desc'"
                        :class="{ 'c-btn--active': activeButton === 'desc', '': activeButton !== 'desc' }"
                        class="tags__link tags__link--filter">
                    Newest
                </button>
                <button wire:click="sortBy('chapter_number', 'ASC')"
                        x-on:click="activeButton = 'asc'"
                        :class="{ 'c-btn--active': activeButton === 'asc', '': activeButton !== 'asc' }"
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
