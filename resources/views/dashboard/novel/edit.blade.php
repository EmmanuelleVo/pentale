<x-layout>
    <x-header.dashboard-header :book="$book" title="Edit {{ $book->title }} - Pentale" page_title="Create new story"/>
    <main id="main" class="dashboard">
        <div class="d-wrapper">
            <form action="/dashboard/novels/{{ $book->slug }}/update" method="post" enctype="multipart/form-data" class="form novel__form">
                @csrf
                @method('PATCH')
                <livewire:file-input :photo="$book->cover"/>

                <div class="form__container">
                    <x-forms.input label_name="Novel title" name="title" :value="$book->title"/>
                    <x-forms.textarea label_name="Synopsis" name="synopsis" placeholder="Write your synopsis"
                                      :value="$book->synopsis"/>

                    <x-forms.field>
                        <label for="genres"
                               class="form__label">Genres</label>
                        <select name="genres[]"
                                id="genres"
                                multiple
                                class="form__select form__select-multiple">
                            @foreach($genres as $genre)
                                <option
                                    @if(old('genres'))
                                        {{ (collect(old('genres'))->contains($genre->id)) ? 'selected':'' }}
                                    @else
                                        @foreach($book->genres()->get() as $bookGenre)
                                            @if($bookGenre->id === $genre->id) selected @endif
                                    @endforeach
                                    @endif
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
                                <option
                                    @if(old('tags'))
                                        {{ (collect(old('tags'))->contains($tag->id)) ? 'selected':'' }}
                                    @else
                                        @foreach($book->tags()->get() as $bookTag)
                                            @if($bookTag->id === $tag->id) selected @endif
                                    @endforeach
                                    @endif
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
                                       value="true"
                                       @if(old('mature'))
                                           {{ old('mature') == true ? 'checked' : '' }}
                                       @else
                                           {{ $book->mature == true ? 'checked' : '' }}
                                       @endif
                                       id="yes">
                                <x-forms.label class="form__label--radio" name="yes" label_name="Yes"/>

                            </div>

                            <div class="form__field--radio">
                                <input type="radio"
                                       class="form__input--radio"
                                       name="mature"
                                       value="false"
                                       @if(old('mature'))
                                           {{ old('mature') == false ? 'checked' : '' }}
                                       @else
                                           {{ $book->mature == false ? 'checked' : '' }}
                                       @endif
                                       id="no">
                                <x-forms.label class="form__label--radio" name="no" label_name="No"/>
                            </div>
                        </div>
                        <x-forms.error name="mature"/>
                    </x-forms.field>

                    <x-forms.select name="status" label_name="Status">
                        @foreach($status as $statusItem)
                            <x-forms.option :name="ucfirst($statusItem)" :value="$statusItem"/>
                        @endforeach
                    </x-forms.select>

                    <x-forms.input label_name="Patreon url (optional)" name="patreon" :value="$book->patreon" place_holder="https://www.patreon.com/"/>


                    <x-forms.button value="Edit novel"/>
                </div>
            </form>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










