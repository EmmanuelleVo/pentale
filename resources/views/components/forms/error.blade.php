@props(['name'])

@error($name)
<span class="form__error">
        {{ $message }}
    </span>
@enderror

{{--@if($errors->hasBag('login'))
    <span class="text-red-500">
        {{ $errors->login->first($name) }}
    </span>
@elseif($errors->hasBag('register'))
    <span class="text-red-500">
        {{ $errors->register->first($name) }}
    </span>
@else
    <span class="text-red-500">
        {{ $errors->first($name) }}
    </span>
@endif()--}}



