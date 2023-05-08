<x-layout>
    <x-header.chapter-header :chapters="$chapters" :book="$book" :chapter="$chapter" title="{{ $chapter->title }} - Pentale"/>
    <main id="main" class="chapter">
        <div class="o-wrapper">
            <section class="chapter__body">
                <x-titles.small-title title="Chapter {{$chapter->chapter_number}} : {{$chapter->title}}"/>
                <div class="chapter__content wysiwyg">
                    {!! $chapter->body !!}
                </div>
                @if($chapter->author_note)
                    <div class="chapter__note wysiwyg">
                        <span class="title title--small">Author's notes</span>
                        {!! $chapter->author_note !!}
                    </div>
                @endif
                <div class="chapter__actions-container chapter__actions-container--bottom">
                    <x-commons.button class="c-btn--secondary" title="Go to previous chapter" link="#">Previous</x-commons.button>
                    <x-commons.button title="Go to next chapter" link="#">Next</x-commons.button>
                </div>
            </section>
        </div>

        <div class="modal">
            <div class="modal__container">
                <div class="modal__content">
                    <form action="#" class="form">
                        <div class="modal__filter form__field">
                            <span class="form__label form__label--title">Status</span>
                            <div class="form__checkbox-container">
                                @foreach($fonts as $font)
                                    <x-forms.checkbox :label_name="ucfirst($font)" :name="str($font)"/>
                                @endforeach
                            </div>
                        </div>
                        <div class="form__field form__field--number">
                            <span class="form__label">Font size</span>
                            <div data-quantity></div>
                        </div>
                        <div class="form__field form__field--number">
                            <span class="form__label">Line height</span>
                            <div data-quantity></div>
                        </div>
                        {{--<x-forms.input name="font-size" label_name="Font size" type="number" place_holder=""/>--}}
                        <div class="form__field form__field--number">
                            <span class="form__label">Night mode</span>
                            @include('livewire.toggle-button')
                        </div>
                        <div class="form__actions-container">
                            <button class="form__reset c-btn c-btn--secondary">Reset</button>
                            <x-forms.button value="Change preferences"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>
