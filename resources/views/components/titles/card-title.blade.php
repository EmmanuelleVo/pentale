@props(['title'])

<h3 {{ $attributes->merge(['class' => 'title title--card']) }} aria-level="3" role="heading">
    {{ $title }}
</h3>
