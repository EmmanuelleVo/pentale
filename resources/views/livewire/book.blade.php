<div>
    <x-titles.section-title title="All novels"/>

    <div class="novels__filters novels__actions accordion" wire:ignore.self>
        <a href="#" class="title-container accordion__button">
            <span class="title title--small">Filter by</span>
            <x-svg.arrow/>
        </a>
        <div class="accordion__container" wire:ignore.self>
            <form class="form accordion__content">
                <div class="novels__filter">
                    <span class="form__label form__label--title">Genre</span>
                    {{--<span class="form__meta">Click once to include genre. Click on the same genre twice to exclude it.</span>--}}
                        {{--<span wire:model="filters.genres">{{ $filters['genres'] }}</span>--}}
                    <div class="form__checkbox-container">
                        {{--wire:key="{{ $category->id }}" TODO:Tristate checkbox--}}
                        @foreach($genres as $genre)
                            <x-forms.checkbox wire:model="filters.genres.{{ $genre->slug }}" :id="$genre->slug" :label_name="$genre->name" name="genres"/>
                        @endforeach
                    </div>
                </div>
                <div class="novels__filter">
                    <span class="form__label form__label--title">Status</span>
                    <div class="form__checkbox-container">
                        @foreach($status as $status_item)
                            <x-forms.radio :label_name="ucfirst($status_item)" :name="$status_item"/>
                        @endforeach
                    </div>
                </div>
                <div class="novels__filter-container">
                    <div class="novels__filter">

                    </div>
                    <div class="novels__filter">

                    </div>
                </div>
                <x-forms.button value="Apply filter"/>
            </form>
        </div>
    </div>

    <div class="novels__sort novels__actions">
        <span class="title title--small">Sort by</span>
        <div class="novels__sort--container tags">
            <div class="tags__list">
                <x-commons.filter-tag wire:click="sortBy('views')" class="tags__link--filter--active" name="Popular" link="#popular"/>
                <x-commons.filter-tag wire:click="sortBy('views')" name="Rating" link="#rating"/>
                <x-commons.filter-tag wire:click="sortBy('published_at')" name="Latest releases" link="#latest-releases"/>
                <x-commons.filter-tag wire:click="sortBy('published_at')" name="Newest novels" link="#newest-novels"/>
            </div>
        </div>
    </div>

    <div class="novels__list">
        @foreach($books as $book)
            <x-cards.novel-full :book="$book"/>
        @endforeach
    </div>
    <div class="novel__chapters-pagination">
        {{ $books->links('pagination::default') }}
    </div>
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

