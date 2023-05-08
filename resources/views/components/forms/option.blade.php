@props(['value', 'name'])

<option value="{{ $value }}"
        {{ request()->input('filter') == $value ? 'selected' : '' }}
        class="form__option">
    {{ $name }}
</option>
