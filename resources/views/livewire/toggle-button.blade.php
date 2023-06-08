<div class="toggle__button">
    <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox" {{ $nightMode == true ? 'checked' : '' }}/>
    <label for="toggle" class="toggle-label" wire:click.prevent="changePreferences('night', true)"></label>
</div>
