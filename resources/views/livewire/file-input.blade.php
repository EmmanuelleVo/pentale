<div class="form__container">
    <x-forms.input type="file" label_name="Cover" name="cover" wire:model="photo" value="{{ $photo ?  : '' }}"/>
    @if($photo && !is_string($photo))
        <figure>
            <img id="imgCover" src="{{ $photo->temporaryUrl() }}" alt="cover"/>
        </figure>
    @endif
    @if($photo && is_string($photo))
        <figure>
            <img id="imgCover" src="{{ $photo }}" alt="cover"/>
        </figure>
    @endif
</div>
