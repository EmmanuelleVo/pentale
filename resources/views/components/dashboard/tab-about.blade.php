@props(['genres', 'book', 'tags'])

<div class="novel__about">
    <div class="novel__about-container">
        <x-titles.small-title title="Genres"/>
        <ul class="genres__list">
            @foreach($genres as $genre)
                <li class="genres__item">
                    <div class="genres__link">
                        <x-commons.tag name="{{ $genre->name }}"/>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="novel__about-container">
        <x-titles.small-title title="Tags"/>
        <ul class="genres__list">
            @foreach($tags as $tag)
                <li class="genres__item">
                    <div class="genres__link">
                        <x-commons.tag name="{{ $tag->name }}"/>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="novel__about-container">
        <x-titles.small-title title="Synopsis"/>
        <div class="wysiwyg novel__about-synopsis">
            {!! $book->synopsis !!}
        </div>
    </div>

</div>
