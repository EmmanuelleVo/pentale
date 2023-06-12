<button {{ $attributes->merge(['type' => 'submit', 'class' => 'c-btn c-btn--danger']) }}>
    {{ $slot }}
</button>
