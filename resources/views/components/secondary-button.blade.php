<button {{ $attributes->merge(['type' => 'button', 'class' => 'c-btn c-btn--secondary']) }}>
    {{ $slot }}
</button>
