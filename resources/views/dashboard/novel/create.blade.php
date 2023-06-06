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
                    <x-forms.search-select id="genres" name="genres[]" label_name="Genres" place_holder="Search or select the genres of the book" list="genreList">
                        @foreach($genres as $genre)
                            <x-forms.option :name="$genre->name" :value="$genre->slug"/>
                        @endforeach
                    </x-forms.search-select>
                    <x-forms.search-select id="tags" name="tags[]" label_name="Tags" place_holder="Search or select the tags of the book" list="genreList">
                        @foreach($tags as $tag)
                            <x-forms.option :name="$tag->name" :value="$tag->slug"/>
                        @endforeach
                    </x-forms.search-select>
                    <x-forms.button value="Create new novel"/>
                </div>
            </form>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










