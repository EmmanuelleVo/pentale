@if(session()->has('success'))
    <div x-data="{ show : true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="flash-message flash-message--success">
        <p>{{ session('success') }}</p>
    </div>
@endif

@if(session()->has('error'))
    <div x-data="{ show : true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="flash-message flash-message--error">
        <p>{{ session('error') }}</p>
    </div>
@endif
