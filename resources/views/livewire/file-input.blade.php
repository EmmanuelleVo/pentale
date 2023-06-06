<div class="form__container">
    <x-forms.input type="file" label_name="Cover" name="cover" wire:model="photo"/>
    @if($photo)
        <figure>
            <img id="imgCover" src="{{ $photo->temporaryUrl() }}" />
        </figure>
    @endif
</div>
