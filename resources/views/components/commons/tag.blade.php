@props(['name'])

<div class="tag">
    <span {{$attributes->merge(['class' => 'textWrapper'])}}>
        {{ $name }}
    </span>
</div>
