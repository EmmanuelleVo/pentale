@props(['name', 'label_name', 'placeholder'])

<x-forms.field>
    <x-forms.label name="{{ $name }}" label_name="{{ $label_name }}" />
    <textarea {{ $attributes->merge(['class' => 'form__textarea']) }}
              name="{{ $name }}"
              id="{{ $name }}"
              placeholder="{{ $placeholder }}"
              rows="10" cols="30">{{old($name)}}</textarea>
    <x-forms.error :name="$name"/>
</x-forms.field>
