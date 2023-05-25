@props(['genres'])

<div class="novels__sort novels__actions">
    <span class="title title--small">Sort by</span>
    <div class="novels__sort--container tags">
        <div class="tags__list">
            <x-commons.filter-tag wire:click="sortBy('views')" class="tags__link--filter--active" name="Popular" link="#"/>
            <x-commons.filter-tag wire:click="sortBy('views')" name="Rating" link="#"/>
            <x-commons.filter-tag wire:click="sortBy('published_at')" name="Latest releases" link="#"/>
            <x-commons.filter-tag wire:click="sortBy('published_at')" name="Newest novels" link="#"/>
        </div>
    </div>
</div>

{{--<div class="novels__filters novels__actions">
    <span class="title title--small">Filter by</span>
    <form action="#" class="form">
        @csrf
        <div class="novels__filter">
            <span class="form__label form__label--title">Genre</span>
            <span class="form__meta">Click once to include genre. Click on the same genre twice to exclude it.</span>
            <div class="form__checkbox-container">
                --}}{{--TODO:Tristate checkbox--}}{{--
                @foreach($genres as $genre)
                    <x-forms.checkbox :label_name="$genre->name" :name="$genre->slug"/>
                @endforeach
            </div>
        </div>
        <div class="novels__filter">
            <span class="form__label form__label--title">Status</span>
            <div class="form__checkbox-container">
                @foreach($status as $status_item)
                    <x-forms.checkbox :label_name="ucfirst($status_item)" :name="$status_item"/>
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
</div>--}}

<div class="novels__list">
    @foreach($books as $book)
        <x-cards.novel-full :book="$book" :views="$views" :rating="$rating"/>
    @endforeach
</div>
