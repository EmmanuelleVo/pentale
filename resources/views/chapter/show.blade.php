<x-layout>
    <x-header.chapter-header :chapters="$chapters" :book="$book" :chapter="$chapter" title="{{ $chapter->title }} - Pentale"/>
    <main id="main" class="chapter">
        <livewire:chapter-show :book="$book" :chapter="$chapter"/>

        <div id="modal" class="modal">
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
                            <div data-quantity data-label="fontSize" data-number="{{ auth()->user() ? auth()->user()->font_size : '16' }}"></div>
                        </div>
                        <div class="form__field form__field--number">
                            <span class="form__label">Line height</span>
                            <div data-quantity data-label="lineHeight" data-number="{{ auth()->user() ? auth()->user()->line_height : '1' }}"></div>
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
