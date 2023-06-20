<x-layout>
    <x-header.page-header title="Login - Pentale"/>
    <main id="main" class="login">
        <div class="login__container">
            <div class="o-wrapper">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <noscript>
                    <div id="js-disabled-message">
                        <p>Please enable JavaScript in your browser to fully experience this website.</p>
                    </div>
                </noscript>
                <div class="login__header">
                    <x-titles.section-title title="Login"/>
                    <p class="login__header-content">Welcome back !</p>
                </div>
                <form action="{{ route('login') }}" method="post" class="form">
                    @csrf
                    <x-forms.input name="email" label_name="Email" place_holder="test@test.com" type="email"/>
                    <x-forms.input autocomplete="current-password" name="password" label_name="Password" place_holder="" type="password"/>
                    <!-- Remember Me -->
                    {{--<div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>--}}

                    <span class="form__text"><a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a></span>
                    <x-forms.button value="{{ __('Log in') }}"/>
                </form>

                {{--<div class="login__google">
                    <p class="login__separator"><span class="login__separator-content">Or</span></p>
                    <span class="login__google-link">
                        <x-svg.google/>
                        <a href="" title="Sign in with Google">Sign in with Google</a>
                    </span>
                </div>--}}

                <div class="login__option">
                    <span>New to Pentale? <a href="{{ route('register') }}" title="Create an account">Create an account</a></span>
                </div>
            </div>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










