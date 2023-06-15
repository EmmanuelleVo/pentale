@props(['value', 'name'])

<option value="{{ $value }}"
            {{ $attributes->merge(['class' => 'form__option']) }}
        >
    {{ $name }}
</option>
