<div class="toggle__button">
    <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox" {{ $mature == true ? 'checked' : '' }}/>
    <label for="toggle" class="toggle-label" wire:click.prevent="change('mature')"></label>
</div>
