@props(['name', 'label_name'])

<x-forms.field>
    <x-forms.label name="{{ $name }}" label_name="{{ $label_name }}"></x-forms.label>
    <select name="{{ $name }}" id="{{ $name }}" class="form__select">
        {{ $slot }}
    </select>
</x-forms.field>
