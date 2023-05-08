<form action="/search" class="form__search form__search--nav">
    @csrf
    <label for="query" class="u-visually-hidden">Search</label>
    <input type="search"
           name="query"
           id="query"
           placeholder="Search a novel or an author"
           class="form__input">
           <x-svg.search />
    <x-forms.button value="Search"/>
</form>
