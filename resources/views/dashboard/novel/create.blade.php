<x-layout>
    <x-header.dashboard-header title="Create a new story - Pentale" page_title="Create new story"/>
    <main id="main" class="dashboard">
        <div class="o-wrapper">
            <form action="/dashboard/novels/store" method="post" enctype="multipart/form-data" class="form novel__form">
                @csrf
                <livewire:file-input />

                <div class="form__container">
                    <x-forms.input label_name="Novel title" name="title"/>
                    <x-forms.textarea label_name="Synopsis" name="synopsis" placeholder="Write your synopsis"/>
                    <x-forms.search-select multiple id="genres" name="genres[]" label_name="Genres" place_holder="Search or select the genres of the book" list="genreList">
                        @foreach($genres as $genre)
                            <x-forms.option :name="$genre->name" :value="$genre->slug"/>
                        @endforeach
                    </x-forms.search-select>
                    {{--<x-forms.search-select multiple id="tags" name="tags[]" label_name="Tags" place_holder="Search or select the tags of the book" list="tagList">
                        @foreach($tags as $tag)
                            <x-forms.option :name="$tag->name" :value="$tag->slug"/>
                        @endforeach
                    </x-forms.search-select>--}}
                    <x-forms.select name="language" label_name="Language">
                        @foreach($languages as $key => $value)
                            <x-forms.option :name="$value" :value="$key"/>
                        @endforeach
                    </x-forms.select>
                    <x-forms.field>
                        <span class="form__label form__label--title">Target audience for adults</span>
                        {{--<div class="form__field--radio">
                            <div>
                                <input type="radio"
                                       class="form__input--radio"
                                       name="mature"
                                       checked
                                       value="true"
                                       id="yes">
                                <x-forms.label name="yes" label_name="Yes" />
                            </div>
                            <div>
                                <input type="radio"
                                       class="form__input--radio"
                                       name="mature"
                                       value="false"
                                       id="no">
                                <x-forms.label name="no" label_name="No" />
                            </div>
                        </div>--}}

                    </x-forms.field>
                    <x-forms.button value="Create new novel"/>
                </div>
            </form>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










