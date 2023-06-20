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
            <noscript>
                <div id="js-disabled-message">
                    <p>Please enable JavaScript in your browser to fully experience this website.</p>
                </div>
            </noscript>
            <h1 class="title title--section title--top" aria-level="1" role="heading">
                {{ $book->title }}
            </h1>
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
