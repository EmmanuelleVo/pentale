@props(['name', 'attribute'])

<div class="meta meta--text">
    <dt class="meta__term">
        <span class="">{{ $name }}</span>
    </dt>
    <dd class="meta__content">
        {{ $attribute }}
    </dd>
</div>
