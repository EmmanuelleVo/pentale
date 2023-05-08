@props(['title', 'book', 'chapter', 'chapters'])

<header class="header header--page">
    <h1 aria-level="1" role="heading" class="u-visually-hidden">{{ $title ?? 'Pentale' }}</h1>
    <x-navigation.navigation/>

    <div class="o-wrapper">
        <div class="header__container">
            <x-titles.section-title :title="$book->title"/>
            <x-breadcrumbs.breadcrumb>
                <x-breadcrumbs.breadcrumb-link :title="$book->title" link="/novels/{{ $book->slug }}" index="2"/>
                <x-breadcrumbs.breadcrumb-separator/>
                <x-breadcrumbs.breadcrumb-link :title="'Chapter ' . $chapter->chapter_number . ' : ' . $chapter->title" link="/novels/{{ $book->slug }}/chapter-{{ $chapter->chapter_number }}" index="3"/>
            </x-breadcrumbs.breadcrumb>

            <div class="chapter__actions">
                <form action="" class="chapter__form form">
                    <x-forms.select name="chapter" label_name="Choose chapter">
                        @foreach($chapters as $chapter)
                            <x-forms.option name="Chapter {{$chapter->chapter_number}} : {{$chapter->title}}" :value="$chapter->chapter_number"/>
                        @endforeach
                    </x-forms.select>
                    <x-forms.button value="Go to chapter"/>
                </form>
                <div class="chapter__actions-container">
                    <x-commons.button class="c-btn--secondary" title="Go to previous chapter" link="#">Previous</x-commons.button>
                    <x-commons.button title="Go to next chapter" link="#">Next</x-commons.button>
                </div>
            </div>
        </div>
    </div>
</header>
