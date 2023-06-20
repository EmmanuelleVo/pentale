<x-layout>
    <x-header.page-header title="Search novels - Pentale"/>
    <main id="main" class="search">
        <div class="o-wrapper">
            <noscript>
                <div id="js-disabled-message">
                    <p>Please enable JavaScript in your browser to fully experience this website.</p>
                </div>
            </noscript>
            <x-titles.section-title title="Search"/>
            <p class="search__result">{{ count($books) }} results for : <span class="bold">{{ $query }}</span></p>

            @if(count($books) > 0)
                <div class="novels__list">
                    @foreach($books as $book)
                        <x-cards.novel-full :book="$book"/>
                    @endforeach
                </div>

                {{ $books->links('pagination::default') }}
            @endif
            {{--@if(count($authors) > 0)
                <div class="novels__list--author">
                    @foreach($authors as $author)
                        <span class="title">{{ $author->username }}</span>
                    @endforeach
                </div>
            @endif--}}

        </div>
    </main>
    <x-footer.footer/>
</x-layout>
