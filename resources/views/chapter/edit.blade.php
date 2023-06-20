<x-layout>
    <x-header.dashboard-header title="{{ $book->title }} - Pentale" :page_title="$book->title"/>
    <main id="main" class="chapter dashboard dashboard--chapter">
        <div class="d-wrapper">
            <form action="/dashboard/novels/{{ $book->slug }}/chapter-{{ $chapter->chapter_number }}/update"
                  class="form" method="post">
                @csrf
                @method('PATCH')
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <x-forms.input label_name="Chapter number" name="chapter_number" disabled
                               value="{{ $chapter->chapter_number }}"/>
                <x-forms.input value="{{ old('title') ? old('title') : $chapter->title }}" label_name="Chapter title" name="title" place_holder="New chapter title"/>
                <x-forms.tinymce-editor value="{!! old('body') ? old('body') : $chapter->body !!}" name="body" label_name="Chapter content"/>
                {{--<x-forms.textarea label_name="Chapter content" name="body" placeholder=""/>--}}
                <x-forms.tinymce-editor value="{!! old('note') ? old('note') : $chapter->note !!}" name="note" label_name="Author’s note (optional)" placeholder="Add author's note at the end of the chapter"/>
                <div class="form__actions">
                    <x-forms.button value="Update chapter"/>
                </div>
            </form>

            <form action="/dashboard/novels/{{ $book->slug }}/chapter-{{ $chapter->chapter_number }}/destroy" class="form" method="POST">
                @csrf
                @method('delete')
                <div class="form__delete">
                    <span class="form__label">Delete your chapter.</span>
                    <x-forms.button class="c-btn--danger" value="Delete chapter"/>
                </div>
            </form>
        </div>

    </main>
    <x-footer.footer/>
</x-layout>
