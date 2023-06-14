@props(['name', 'label_name'])

<x-forms.field>
    <x-forms.label name="{{ $name }}" label_name="{{ $label_name }}"></x-forms.label>
    <select name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => 'form__select']) }}>
        {{ $slot }}
    </select>
    <x-forms.error :name="$name"/>
</x-forms.field>
