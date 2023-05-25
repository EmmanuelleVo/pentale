<x-layout>
    <x-header.dashboard-header title="Create a new story - Pentale"/>
    <main id="main" class="dashboard">
        <div class="o-wrapper">
            <form action="/dashboard/novels/store" method="post" enctype="multipart/form-data" class="form novel__form">
                @csrf
                <div class="form__container">
                    <x-forms.input type="file" label_name="Cover" name="cover"/>
                    <figure>
                        <img id="imgCover" src="#" />
                    </figure>
                </div>
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










