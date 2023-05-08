@props(['name', 'label_name'])

<label for="{{ $name }}"
    {{ $attributes->merge(['class' => 'form__label']) }}>
    {{ $label_name }}
</label>
