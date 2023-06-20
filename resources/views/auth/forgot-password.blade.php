<x-layout>
    <x-header.page-header title="Password Forgotten - Pentale"/>
    <main id="main" class="login">
        <div class="login__container">
            <div class="o-wrapper">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="login__header">
                    <x-titles.section-title title="Password Forgotten"/>
                    <p class="login__header-content">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
                </div>
                <form action="{{ route('password.email') }}" method="post" class="form">
                    @csrf
                    <x-forms.input name="email" label_name="Email" place_holder="test@test.com" type="email"/>

                    <x-forms.button value="{{ __('Email Password Reset Link') }}"/>
                </form>

                <div class="login__option">
                    <span><a href="{{ route('login') }}" title="Back to login">Back to login</a></span>
                </div>
            </div>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>



