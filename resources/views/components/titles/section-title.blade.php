@props(['title'])

<h2 {{ $attributes->merge(['class' => 'title title--section']) }} aria-level="2" role="heading">
    {{ $title }}
</h2>
