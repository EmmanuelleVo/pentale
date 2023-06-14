<x-layout>
    <x-header.dashboard-novel-header title="{{ $book->title }} - Pentale" :page_title="$book->title" :book="$book"/>
    <main id="main" class="chapter dashboard dashboard--chapter">
        <div class="d-wrapper">
            <form action="/dashboard/novels/{{ $book->slug }}/store" class="form" method="post">
                @csrf
                <x-forms.input label_name="Chapter number" name="chapter_number" value="{{ $lastChapter === 0 ? 1 : $lastChapter->chapter_number + 1 }}" disabled/>
                <x-forms.input label_name="Chapter title" name="title" place_holder="New chapter title"/>
                <x-forms.tinymce-editor name="body" label_name="Chapter content"/>
                {{--<x-forms.textarea label_name="Chapter content" name="body" placeholder=""/>--}}
                <x-forms.textarea label_name="Author’s note (optional)" name="note" placeholder="Add author's note at the end of the chapter"/>
                <div class="form__actions">
                    <x-forms.button value="Save"/>
                    <x-forms.button value="Publish"/>
                </div>
            </form>
        </div>

    </main>
    <x-footer.footer/>
</x-layout>
