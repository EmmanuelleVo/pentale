@props(['name', 'label_name', 'place_holder' => '', 'type' => 'text', 'list', 'id'])

<x-forms.field>
    <x-forms.label name="{{ $name }}" label_name="{{ $label_name }}"></x-forms.label>
    <input {{ $attributes->merge(['class' => 'form__input']) }}
            type="{{ $type }}"
           list="{{ $list }}"
           name="{{ $name }}"
           id="{{ $id }}"
           placeholder="{{ $place_holder }}"
        {{ $attributes(['value' => old($name)]) }}>
    <x-forms.error :name="$name"/>
    <datalist id="{{ $list }}">
        {{ $slot }}
    </datalist>
</x-forms.field>
