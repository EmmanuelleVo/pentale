@props(['value', 'name'])

<option value="{{ $value }}"
        {{ request()->input('filter') == $value ? 'selected' : '' }}
            {{ $attributes->merge(['class' => 'form__option']) }}
        >
    {{ $name }}
</option>
