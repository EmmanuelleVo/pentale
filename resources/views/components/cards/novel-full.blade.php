@props(['book'])

<div class="novel__item novel__item--full">
    <div class="novel__item-container--left">
        <figure class="novel__item-figure">
            <img src="{{ $book->cover }}" alt="Cover of {{ $book->title }}" class="novel__item-img">
        </figure>
    </div>
    <div class="novel__item-container--right">
        <div class="novel__item-content">
            <x-titles.card-title :title="$book->title"/>
            <span class="novel__author">{{ $book->user->username }}</span>
            <dl class="novel__item-container--meta meta__container">
                <x-commons.meta-image name="Rating" attribute="{{ round($book->reviews()->avg('overall'), 2) }}">
                    <x-svg.star/>
                </x-commons.meta-image>
                <x-commons.meta-image name="Total views"
                                      attribute="{{ \App\Helpers\Helper::convert($book->chapters()->sum('views')) }} views">
                    <x-svg.view/>
                </x-commons.meta-image>

                <x-commons.meta-image name="Total chapters" attribute="{{ $book->chapters()->count() }} chapters">
                    <x-svg.chapter/>
                </x-commons.meta-image>
                <x-commons.meta-image name="Status" attribute="{{ $book->status }}">
                    <x-svg.chapter/>
                </x-commons.meta-image>
                {{--<time class="review__date" datetime="{{ $review->published_at }}">{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</time>--}}
                <x-commons.meta-image name="Last update"
                                      attribute="{{ \Carbon\Carbon::parse($book->chapters()->latest('chapters.published_at')->first()->published_at)->diffForHumans() }}">
                    <x-svg.time/>
                </x-commons.meta-image>
            </dl>
            <div class="novel__item-genres genres">
                <span class="u-visually-hidden">Genres :</span>
                <ul class="genres__list">
                    @foreach($book->genres()->orderBy('name')->paginate(3) as $book_genre)
                        <li class="genres__item">
                            <a href="#" class="genres__link" title="List novel with the genre : {{ $book_genre->name }}">
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
