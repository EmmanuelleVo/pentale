<div class="o-wrapper">
    <section class="chapter__body" lang="{{ $book->language }}">
        <x-titles.small-title title="Chapter {{$chapter->chapter_number}} : {{$chapter->title}}"/>
        <div id="change" class="chapter__content wysiwyg">
            {!! $chapter->body !!}
        </div>
        @if($chapter->author_note)
            <div class="chapter__note wysiwyg">
                <span class="title title--small">Author's notes</span>
                {!! $chapter->author_note !!}
            </div>
        @endif
        <div class="chapter__actions-container chapter__actions-container--bottom">
            <x-commons.button class="c-btn--secondary" title="Go to previous chapter" link="#">Previous</x-commons.button>
            <x-commons.button title="Go to next chapter" link="#">Next</x-commons.button>
        </div>
    </section>

    <section class="chapter__comments">

    </section>
</div>
