@props(['name', 'label_name'])

<x-forms.field>
    <input type="radio"
           class="form__input--radio"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ $name }}">
    <x-forms.label name="{{ $name }}" label_name="{{ $label_name }}" />
</x-forms.field>
