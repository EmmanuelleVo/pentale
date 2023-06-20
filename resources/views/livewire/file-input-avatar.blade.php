<div class="form__container form__container--file">
    <x-forms.input type="file"
                   label_name="Avatar"
                   name="avatar"
                   accept="image/png, image/jpeg, image/jpg"
                   wire:model="photo" value="{{ $photo ?  : '' }}"/>

    @if($photo && !is_string($photo))
        <figure class="file-figure">
            <img id="imgCover" src="{{ $photo->temporaryUrl() }}" alt="cover"/>
        </figure>
    @endif
    @if($photo && is_string($photo))
        <figure class="file-figure">
            <img id="imgCover" src="{{ $photo }}" alt="cover"/>
        </figure>
    @endif
</div>
