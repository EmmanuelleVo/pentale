<div>
    <x-titles.section-title class="title--top" title="All novels"/>

    <div class="novels__filters novels__actions accordion" wire:ignore.self>
        <button class="title-container accordion__button" aria-label="Open filters accordeon">
            <span class="title title--small">Filter by</span>
            <x-svg.arrow/>
        </button>
        <div class="accordion__container" wire:ignore.self>
            <form class="form accordion__content">
                <div class="novels__filter">
                    <span class="form__label form__label--title">Genre</span>
                    {{--<span class="form__meta">Click once to include genre. Click on the same genre twice to exclude it.</span>--}}
                    {{--<span wire:model="filters.genres">{{ $filters['genres'] }}</span>--}}
                    <div class="form__checkbox-container">
                        {{--wire:key="{{ $category->id }}" TODO:Tristate checkbox--}}
                        @foreach($genres as $genre)
                            <x-forms.checkbox wire:model="filters.genres.{{ $genre->slug }}" :id="$genre->slug"
                                              :label_name="$genre->name" name="genres"/>
                        @endforeach
                    </div>
                </div>
                {{--<div class="novels__filter">
                    <span class="form__label form__label--title">Status</span>
                    <div class="form__field--radio-container">
                        @foreach($status as $status_item)
                            <x-forms.radio :label_name="ucfirst($status_item)" :name="$status_item"/>
                            <div class="form__field--radio">
                                <input type="radio"
                                       class="form__input--radio"
                                       name="{{ $status_item }}"
                                       value="{{ $status_item }}"
                                       @if(old($status_item))
                                           {{ old($status_item) == false ? 'checked' : '' }}
                                       @else
                                           {{ $status_item == false ? 'checked' : '' }}
                                       @endif
                                       id="{{ $status_item }}">
                                <x-forms.label class="form__label--radio" :name="$status_item" :label_name="ucfirst($status_item)"/>
                            </div>
                        @endforeach
                    </div>
                </div>--}}
                <x-forms.button class="u-visually-hidden" value="Apply filter"/>
            </form>
        </div>
    </div>

    <div class="novels__sort novels__actions">
        <span class="title title--small">Sort by</span>
        <div class="novels__sort-container tags">
            <div class="tags__list"
                 @if(request()->get('sort') === 'popular')
                     x-data="{ activeButton: 'popular'}"
                 @elseif(request()->get('sort') === 'rating')
                     x-data="{ activeButton: 'rating'}"
                 @elseif(request()->get('sort') === 'latest-releases')
                     x-data="{ activeButton: 'latest-releases'}"
                 @elseif(request()->get('sort') === 'newest-novels')
                     x-data="{ activeButton: 'newest-novels'}"
                @endif
            >
                <button wire:click="sortBy('popular')"
                        @click="activeButton='popular'"
                        :class="{[activeButton==='popular']: 'c-btn--active'}"
                        class="tags__link tags__link--filter">
                    Popular
                </button>

                <button wire:click="sortBy('rating')"
                        x-on:click="activeButton = 'rating'"
                        :class="{[activeButton==='rating']: 'c-btn--active'}"
                        class="tags__link tags__link--filter">
                    Rating
                </button>
                <button wire:click="sortBy('latest-releases')"
                        x-on:click="activeButton = 'latest-releases'"
                        :class="{[activeButton==='latest-releases']: 'c-btn--active'}"
                        class="tags__link tags__link--filter">
                    Latest releases
                </button>
                <button wire:click="sortBy('newest-novels')"
                        x-on:click="activeButton = 'newest-novels'"
                        :class="{[activeButton==='newest-novels']: 'c-btn--active'}"
                        class="tags__link tags__link--filter">
                    Newest novels
                </button>
            </div>
        </div>
    </div>

    @if(count($books) > 0)
        <div class="novels__list">
            @foreach($books as $book)
                <x-cards.novel-full :book="$book"/>
            @endforeach
        </div>
        <div class="novel__chapters-pagination">
            {{ $books->links('pagination::default') }}
        </div>
    @else
        <x-commons.no-collection>There are no books matching your filters.</x-commons.no-collection>
    @endif
</div>

{{--@push('body_script') // this section name can be whatever you want...
<script type="text/javascript">

    // waiting for DOM loaded
    document.addEventListener('DOMContentLoaded', function () {

        // listen for the event
        window.livewire.on('urlChanged', param => {

            // pushing on the history by passing the current url with the param appended
            history.pushState(null, null, `${document.location.pathname}?${param}`);
        });
    });
</script>
@endpush--}}

