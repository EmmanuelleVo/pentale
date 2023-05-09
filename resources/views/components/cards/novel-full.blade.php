@props(['book'])

<div class="novel__item novel__item--full">
    <div class="novel__item-container--left">
        <figure class="novel__item-figure">
            <img src="{{ $book->cover }}" alt="" class="novel__item-img">
        </figure>
        {{--TODO: ADD REVIEW--}}
    </div>
    <div class="novel__item-container--right">
        <div class="novel__item-content">
            <x-titles.card-title :title="$book->title" />
            <dl class="novel__item-container--meta meta__container">
                <x-commons.meta-image name="Rating" attribute="4.9"/>
                <x-commons.meta-image name="Total views" attribute="300K views"/>
                <x-commons.meta-image name="Total chapters" attribute="167 chapters"/>
            </dl>
            <div class="novel__item-genres genres">
                <span class="u-visually-hidden">Genres :</span>
                <ul class="genres__list">
                    @foreach($book->genres()->orderBy('name')->paginate(3) as $book_genre)
                        <li class="genres__item">
                            <a href="#" class="genres__link">
                                <x-commons.tag name="{{ $book_genre->name }}"/>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="novel__item-description wysiwyg">
                {!! \Illuminate\Support\Str::limit($book->synopsis, 100, $end='...') !!}
            </div>
        </div>
    </div>
    <a href="/novels/{{ $book->slug }}" class="u-absolute" title="Learn more about {{ $book->title }}"></a>
</div>
