@props(['name', 'label_name'])

<x-forms.field class="form__field--checkbox">
    <input type="checkbox"
           class="form__input--checkbox u-visually-hidden"
           name="{{ $name }}[]"
           id="{{ $name }}"
           value="{{ $name }}">
    <x-forms.label class="form__label--checkbox"
                   name="{{ $name }}" label_name="{{ $label_name }}">
    </x-forms.label>

</x-forms.field>
