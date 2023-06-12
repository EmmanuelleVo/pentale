<x-layout>
    <x-header.page-header title="Reset password - Pentale"/>
    <main id="main" class="login">
        <div class="login__container">
            <div class="o-wrapper">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="login__header">
                    <x-titles.section-title title="Reset password"/>
                </div>
                <form action="{{ route('password.store') }}" method="post" class="form">
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <x-forms.input name="email" label_name="Email" place_holder="test@test.com" type="email" :value="old('email', $request->email)" required autofocus autocomplete="username"/>
                    <x-forms.input name="password" label_name="{{ __('Password') }}" type="password" required autocomplete="new-password"/>
                    <x-forms.input name="password_confirmation" label_name="{{ __('Confirm Password') }}" type="password" required autocomplete="new-password"/>
                    <x-forms.button value="{{ __('Reset password') }}"/>
                </form>

            </div>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>



