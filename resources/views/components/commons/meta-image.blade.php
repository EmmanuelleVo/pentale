@props(['name', 'attribute'])

<div class="meta meta--image">
    <dt class="meta__term">
        {{ $slot }}
        <span class="u-visually-hidden">{{ $name }}</span>
    </dt>
    <dd class="meta__content">
        {{ $attribute }}
    </dd>
</div>
