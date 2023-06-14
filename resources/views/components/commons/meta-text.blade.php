@props(['name', 'attribute'])

<div class="meta meta--text">
    <dt class="meta__term">
        <span class="">{{ $name }}</span>
    </dt>
    <dd {{ $attributes->merge(['class' => 'meta__content']) }}>
        {{ $attribute }}
    </dd>
</div>
