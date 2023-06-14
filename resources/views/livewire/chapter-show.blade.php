<div class="o-wrapper" x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
    <div class="header">
        <div class="chapter__actions-container chapter__actions-container--top">
            @livewire('bookmark', [$book])
            <x-commons.button @click.prevent="showModal = ! showModal" {{--id="modalBtn"--}} class="chapterOption"
                              title="Display reader preferences" link="#">
                <x-svg.settings/>
                <span>Reader preferences</span>
            </x-commons.button>
        </div>

        <div class="chapter__actions">
            <form class="chapter__form form" wire:submit.prevent>
                @csrf
                <x-forms.select wire:model="chapterNumber" name="chapterNumber"
                                label_name="Choose chapter">
                    @foreach($chapters as $chapterItem)
                        <option {{ $chapter->chapter_number === $chapterItem->chapter_number ? 'selected' : '' }}
                                value="{{ $chapterItem->chapter_number }}">
                            Chapter {{$chapterItem->chapter_number}} : {{$chapterItem->title}}
                        </option>
                    @endforeach
                </x-forms.select>
                <x-forms.button value="Go to chapter"/>
            </form>
            <div class="chapter__actions-container">
                @if($previousChapter)
                    <x-commons.button class="c-btn--secondary" title="Go to previous chapter"
                                      link="/novels/{{ $book->slug }}/chapter-{{ $chapterNumber-1 }}">Previous
                    </x-commons.button>
                @endif
                @if($nextChapter)
                    <x-commons.button title="Go to next chapter"
                                      link="/novels/{{ $book->slug }}/chapter-{{ $chapterNumber+1 }}">Next
                    </x-commons.button>
                @endif
                @if(!$previousChapter && !$nextChapter)
                    <x-commons.button class="c-btn--secondary" title="Go novel page" link="/novels/{{ $book->slug }}">
                        Novel details
                    </x-commons.button>
                @endif
            </div>
        </div>
    </div>
    <section class="chapter__body" lang="{{ $book->language }}">
        <x-titles.small-title title="Chapter {{$chapter->chapter_number}} : {{$chapter->title}}"/>
        <div id="change" class="chapter__content wysiwyg"
             style="font-size: {{{ $fontSize }}}px;line-height: {{{ $lineHeight }}}px; font-family: '{{{ $fontFamily }}}', sans-serif">
            {!! $chapter->body !!}
        </div>
        @if($chapter->author_note)
            <div class="chapter__note wysiwyg"
                 style="font-size: {{{ $fontSize }}}px;line-height: {{{ $lineHeight }}}px; font-family: '{{{ $fontFamily }}}', sans-serif">
                <span class="title title--small">Author's notes</span>
                {!! $chapter->author_note !!}
            </div>
        @endif
        <div class="chapter__actions-container chapter__actions-container--bottom">
            @if($previousChapter)
                <x-commons.button class="c-btn--secondary" title="Go to previous chapter"
                                  link="/novels/{{ $book->slug }}/chapter-{{ $chapterNumber-1 }}">Previous
                </x-commons.button>
            @endif
            @if($nextChapter)
                <x-commons.button title="Go to next chapter"
                                  link="/novels/{{ $book->slug }}/chapter-{{ $chapterNumber+1 }}">Next
                </x-commons.button>
            @endif
            @if(!$previousChapter && !$nextChapter)
                <x-commons.button class="c-btn--secondary" title="Go novel page" link="/novels/{{ $book->slug }}">
                    Novel details
                </x-commons.button>
            @endif
        </div>
    </section>



    <div id="modal" class="modal" :class="{ 'modal--active': showModal }" x-show="showModal">
        <div class="modal__container">
            <div class="modal__content">
                <form action="#" class="form">
                    <div class="modal__filter form__field">
                        <span for="fontFamily" class="form__label form__label--title">Font family</span>
                        <div class="form__checkbox-container">
                            @foreach($fonts as $font)
                                <x-forms.field class="form__field--checkbox">
                                    <input type="radio"
                                           class="form__input--radio u-visually-hidden"
                                           {{ session()->get('user_preferences.fontFamily') == $font ? 'checked' : '' }}
                                           name="fontFamily"
                                           id="{{ mb_strtolower($font) }}"
                                           value="{{ $font }}">
                                    <x-forms.label class="form__label--checkbox"
                                                   wire:click.prevent="changePreferences('fontFamily', '{{ $font }}')"
                                                   name="{{ mb_strtolower($font) }}" label_name="{{ ucfirst($font) }}">
                                    </x-forms.label>

                                </x-forms.field>
                            @endforeach
                        </div>
                    </div>
                    <div class="form__field form__field--number">
                        <label for="fontSize" class="form__label">Font size</label>
                        <div data-quantity data-label="fontSize" data-number="{{ $fontSize }}">
                            <button class="sub" type="button" title="Down"
                                    wire:click.prevent="changePreferences('fontSize', 'sub')">
                                Down
                            </button>
                            <input disabled wire:model="fontSize" id="fontSize" type="number" name="quantity"
                                   pattern="[0-9]+" {{--value="{{ $fontSize }}"--}}>
                            <button class="add" type="button" title="Up"
                                    wire:click.prevent="changePreferences('fontSize', 'add')">
                                Up
                            </button>
                        </div>
                    </div>
                    <div class="form__field form__field--number">
                        <label for="lineHeight" class="form__label">Line height</label>
                        <div data-quantity data-label="lineHeight"
                             data-number="{{ session()->get('user_preferences.lineHeight') }}">
                            <button class="sub" type="button" title="Down"
                                    wire:click.prevent="changePreferences('lineHeight', 'sub')">
                                Down
                            </button>
                            <input disabled id="lineHeight" type="number" name="quantity" pattern="[0-9]+"
                                   value="{{ session()->get('user_preferences.lineHeight') }}">
                            <button class="add" type="button" title="Up"
                                    wire:click.prevent="changePreferences('lineHeight', 'add')">
                                Up
                            </button>
                        </div>
                    </div>
                    <div class="form__field form__field--number">
                        <span class="form__label">Night mode</span>
                        @include('livewire.toggle-button')
                    </div>
                    <div class="form__actions-container">
                        <button wire:click.prevent="resetPreferences()" class="form__reset c-btn c-btn--secondary">
                            Reset
                        </button>
                        <x-forms.button class="u-visually-hidden" value="Change preferences"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
