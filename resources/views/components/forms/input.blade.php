@props(['name', 'label_name', 'place_holder', 'type' => 'text'])

<x-forms.field>
    <div class="{{ $name === 'password' || $name === 'password_confirmation' || $name === 'register-password' ? 'form__label-container' : '' }}">
        <x-forms.label name="{{ $name }}" label_name="{{ $label_name }}"></x-forms.label>
        @if($name === 'password' || $name === 'password_confirmation' || $name === 'register-password')
            @php
                if ($name === 'password') {
                    $visibilityName = 'password-visibility';
                } elseif($name === 'password_confirmation') {
                    $visibilityName = 'password-confirmation-visibility';
                } elseif($name === 'register-password') {
                    $visibilityName = 'register-password-visibility';
                }
            @endphp
            <div class="form__input--visibility">
                <label class="form__input--visibility-label" for="{{ $visibilityName }}">Show</label>
                <input type="checkbox" id="{{ $visibilityName }}" class="form__input--visibility-input">
            </div>
        @endif
    </div>
    <input {{ $attributes->merge(['class' => 'form__input']) }}
            type="{{ $type }}"
           name="{{ $name }}"
           id="{{ $name }}"
           placeholder="{{ $place_holder }}"
        {{ $attributes(['value' => old($name)]) }}>
    <x-forms.error :name="$name"/>
</x-forms.field>
