@props(['title'])

<h1 {{ $attributes->merge(['class' => 'title title--page title--section']) }} aria-level="1" role="heading">
    {{ $title }}
</h1>
