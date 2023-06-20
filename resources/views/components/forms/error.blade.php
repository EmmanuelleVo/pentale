@props(['name'])

@error($name)
<span class="form__error">
        {{ $message }}
    </span>
@enderror

