<x-layout>
    <x-header.dashboard-header title="Create a new story - Pentale" page_title="Create new story"/>
    <main id="main" class="dashboard">
        <div class="o-wrapper">
            <form action="/dashboard/novels/store" method="post" enctype="multipart/form-data" class="form novel__form">
                @csrf
                <livewire:file-input/>

                <div class="form__container">
                    <x-forms.input label_name="Novel title" name="title"/>
                    <x-forms.textarea label_name="Synopsis" name="synopsis" placeholder="Write your synopsis"/>
                    {{--<x-forms.search-select multiple id="genres" name="genres[]" label_name="Genres" place_holder="Search or select the genres of the book" list="genreList">
                        @foreach($genres as $genre)
                            <x-forms.option :name="$genre->name" :value="$genre->slug"/>
                        @endforeach
                    </x-forms.search-select>--}}
                    {{--<x-forms.search-select multiple id="tags" name="tags[]" label_name="Tags"
                                           place_holder="Search or select the tags of the book" list="tagList">
                        @foreach($tags as $tag)
                            <x-forms.option :name="$tag->name" :value="$tag->slug"/>
                        @endforeach
                    </x-forms.search-select>--}}

                    <x-forms.field>
                        <label for="genres"
                               class="form__label">Genres</label>
                        <select name="genres[]"
                                id="genres"
                                multiple
                                class="form__select form__select-multiple">
                            @foreach($genres as $genre)
                                <option {{ (collect(old('genres'))->contains($genre->id)) ? 'selected':'' }}
                                        value="{{ $genre->id }}">
                                    {{ $genre->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-forms.error name="genres"/>
                    </x-forms.field>


                    <x-forms.field>
                        <label for="tags"
                               class="form__label">Tags</label>
                        <select name="tags[]"
                                id="tags"
                                multiple
                                class="form__select form__select-multiple">
                            @foreach($tags as $tag)
                                <option {{ (collect(old('tags'))->contains($tag->id)) ? 'selected':'' }}
                                        value="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-forms.error name="tags"/>
                    </x-forms.field>


                    <x-forms.select name="language" label_name="Language">
                        @foreach($languages as $key => $value)
                            <x-forms.option :name="$value" :value="$key"/>
                        @endforeach
                    </x-forms.select>
                    <x-forms.field>
                        <span class="form__label form__label--title">Is your target audience for 18+ ?</span>
                        <div class="form__field--radio-container">
                            <div class="form__field--radio">
                                <input type="radio"
                                       class="form__input--radio"
                                       name="mature"
                                       checked
                                       value="true"
                                       id="yes">
                                <x-forms.label class="form__label--radio" name="yes" label_name="Yes"/>

                            </div>

                            <div class="form__field--radio">
                                <input type="radio"
                                       class="form__input--radio"
                                       name="mature"
                                       value="false"
                                       id="no">
                                <x-forms.label class="form__label--radio" name="no" label_name="No"/>
                            </div>
                        </div>
                        <x-forms.error name="mature"/>

                    </x-forms.field>
                    <x-forms.button value="Create new novel"/>
                </div>
            </form>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










