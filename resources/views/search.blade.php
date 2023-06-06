<x-layout>
    <x-header.page-header title="Search novels - Pentale"/>
    <main id="main" class="search">
        <div class="o-wrapper">
            <x-titles.section-title title="Search"/>
            <p>{{ count($books) + count($authors) }} results for : {{ $query }}</p>

            @if(count($books) > 0)
                <div class="novels__list">
                    @foreach($books as $book)
                        <x-cards.novel-full :book="$book" :views="$views" :rating="$rating"/>
                    @endforeach
                </div>
            @endif
            @if(count($authors) > 0)
                <div class="novels__list--author">
                    @foreach($authors as $author)
                        <span class="title">{{ $author->username }}</span>
                    @endforeach
                </div>
            @endif

            @if(count($books) <= 0 && count($authors) <= 0)
                <p>No search.</p>
            @endif

        </div>
    </main>
    <x-footer.footer/>
</x-layout>
