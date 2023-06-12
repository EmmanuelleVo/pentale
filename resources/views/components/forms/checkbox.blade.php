@props(['name', 'label_name', 'id'])

<x-forms.field class="form__field--checkbox">
    <input type="checkbox"
           {{ $attributes->merge(['class' => 'form__input--checkbox u-visually-hidden']) }}
           name="{{ $name }}[]"
           id="{{ $id }}">
    <x-forms.label class="form__label--checkbox"
                   name="{{ $id }}" label_name="{{ $label_name }}">
    </x-forms.label>

</x-forms.field>
