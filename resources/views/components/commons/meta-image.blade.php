@props(['name', 'attribute'])

<div class="meta meta--image">
    <dt class="meta__term">
        <x-svg.mail /> {{--TODO: FIND SVG/PNG PROPS--}}
        <span class="u-visually-hidden">{{ $name }}</span>
    </dt>
    <dd class="meta__content">
        {{ $attribute }}
    </dd>
</div>
