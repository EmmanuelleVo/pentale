@props(['value'])

<input type="submit"
       value="{{ $value }}"
        {{ $attributes->merge(['class' => 'c-btn c-btn--primary form__button']) }}
>
