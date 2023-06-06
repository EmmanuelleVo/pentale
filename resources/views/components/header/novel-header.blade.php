@props(['book', 'book_genres', 'book_tags', 'book_average'])

<header class="header header--novel">
    <h1 aria-level="1" role="heading" class="u-visually-hidden">{{ $title ?? 'Novel - Pentale' }}</h1>
    <x-navigation.navigation/>

</header>
