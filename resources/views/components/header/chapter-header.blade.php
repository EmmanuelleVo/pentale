@props(['title', 'book', 'chapter', 'chapters'])

<header class="header header--page">
    <h1 aria-level="1" role="heading" class="u-visually-hidden">{{ $title ?? 'Pentale' }}</h1>
    <x-navigation.navigation/>
    <div class="progress">
        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>
    </div>

    <div class="o-wrapper">
        <div class="header__container">
            <x-titles.section-title :title="$book->title"/>
            <x-breadcrumbs.breadcrumb>
                <x-breadcrumbs.breadcrumb-link title="novels" link="/novels" index="2"/>
                <x-breadcrumbs.breadcrumb-separator/>
                <x-breadcrumbs.breadcrumb-link :title="\Illuminate\Support\Str::limit($book->title, 40, $end='...')" link="/novels/{{ $book->slug }}" index="3"/>
                <x-breadcrumbs.breadcrumb-separator/>
                <x-breadcrumbs.breadcrumb-link :title="'Chapter ' . $chapter->chapter_number . ' : ' . \Illuminate\Support\Str::limit($chapter->title, 30, $end='...')" link="/novels/{{ $book->slug }}/chapter-{{ $chapter->chapter_number }}" index="4"/>
            </x-breadcrumbs.breadcrumb>

        </div>
    </div>
</header>
