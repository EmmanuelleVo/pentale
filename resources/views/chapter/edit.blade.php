<x-layout>
    <x-header.dashboard-header title="{{ $book->title }} - Pentale" :page_title="$book->title"/>
    <main id="main" class="chapter dashboard--chapter">
        <div class="o-wrapper">
            <form action="/dashboard/stories/{{ $book->slug }}/update" class="form" method="post">
                @method('PATCH')
                @csrf
                <x-forms.input label_name="Chapter title" name="title" place_holder="Chapter 1 : New chapter title"/>
                <x-forms.textarea label_name="Chapter content" name="body"/>
                <x-forms.textarea label_name="Author's note" name="note" placeholder="Add author’s note at the end of the chapter"/>
                <div class="form__actions">
                    <x-forms.button value="Edit"/>
                    <x-forms.button value="Publish"/>
                </div>
            </form>
        </div>

    </main>
    <x-footer.footer/>
</x-layout>
