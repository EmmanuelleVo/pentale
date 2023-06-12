<x-layout>
    <x-header.page-header title="Verify Email - Pentale"/>
    <main id="main" class="login">
        <div class="login__container">
            <div class="o-wrapper">
                <div class="login__header">
                    <x-titles.section-title title="Verify Email"/>
                    <p class="login__header-content">{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <form action="{{ route('verification.send') }}" method="post" class="form">
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <x-forms.input name="email" label_name="Email" place_holder="test@test.com" type="email" :value="old('email', $request->email)" required autofocus autocomplete="username"/>
                    <x-forms.input name="password" label_name="{{ __('Password') }}" type="password" required autocomplete="new-password"/>
                    <x-forms.input name="password_confirmation" label_name="{{ __('Confirm Password') }}" type="password" required autocomplete="new-password"/>
                    <x-forms.button value="{{ __('Resend Verification Email') }}"/>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="form">
                    @csrf
                    <x-forms.button value="{{ __('Log out') }}"/>
                </form>

            </div>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>



