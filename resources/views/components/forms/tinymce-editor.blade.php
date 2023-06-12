@props(['name', 'label_name', 'placeholder' => '', 'value' => ''])

<x-forms.field>
    <x-forms.label name="{{ $name }}" label_name="{{ $label_name }}" />
    <textarea {{ $attributes->merge(['class' => 'form__textarea']) }}
              name="{{ $name }}"
              id="{{ $name }}"
              required
              placeholder="{{ $placeholder }}">{{ $value != '' ? $value : old($name) }}</textarea>
    <x-forms.error :name="$name"/>
</x-forms.field>
