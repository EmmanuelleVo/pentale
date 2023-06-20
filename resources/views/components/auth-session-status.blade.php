@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'form__success']) }}>
        <p>{{ $status }}</p>
    </div>
@endif
