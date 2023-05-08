<x-layout>
    <x-header.novel-header :book="$book" :book_genres="$book_genres" :book_tags="$book_tags" :book_average="$book__average" title="{{ $book->title }} - Pentale"/>
    <main id="main" class="novel">
        <div class="o-wrapper">
            <div class="tab">
                <x-commons.tab class="tab__link--active" link="#about" name="About"/>
                <x-commons.tab link="#chapters" name="Chapters"/>
                <x-commons.tab link="#reviews" name="Reviews"/>
            </div>

            {{--<section id="About" class="tab__content tab__content--active">
                <x-novel.tab-about :synopsis="$book->synopsis" patreon__link="#" :books="$other_books"/>
            </section>
            <section id="Chapters" class="tab__content">
                <x-novel.tab-chapters :chapters="$chapters"/>
            </section>--}}
            <section style="display: block;" id="Reviews" class="tab__content">
                <x-novel.tab-reviews :reviews="$book_reviews"/>
            </section>
        </div>

    </main>
    <x-footer.footer/>
</x-layout>
