<x-layout>
    <x-header.chapter-header :chapters="$chapters" :book="$book" :chapter="$chapter" title="{{ $chapter->title }} - Pentale"/>
    <main id="main" class="chapter">
        <div class="o-wrapper">
            <section class="chapter__body">
                <x-titles.small-title title="Chapter {{$chapter->chapter_number}} : {{$chapter->title}}"/>
                <div class="chapter__content wysiwyg">
                    {!! $chapter->body !!}
                </div>
                @if($chapter->author_note)
                    <div class="chapter__note wysiwyg">
                        <span class="title title--small">Author's notes</span>
                        {!! $chapter->author_note !!}
                    </div>
                @endif
                <div class="chapter__actions">
                    <x-commons.button class="c-btn--secondary" title="Go to previous chapter" link="#">Previous</x-commons.button>
                    <x-commons.button title="Go to next chapter" link="#">Next</x-commons.button>
                </div>
            </section>
        </div>

    </main>
    <x-footer.footer/>
</x-layout>
