<x-layout>
    <x-header.page-header title="Register - Pentale"/>
    <main id="main" class="login register">
        <div class="login__container">
            <div class="o-wrapper">
                <noscript>
                    <div id="js-disabled-message">
                        <p>Please enable JavaScript in your browser to fully experience this website.</p>
                    </div>
                </noscript>
                <div class="login__header">
                    <x-titles.section-title title="Register"/>
                    <p class="login__header-content">Not a member yet?</p>
                </div>
                <form action="{{ route('register') }}" method="post" class="form">
                    @csrf
                    <x-forms.input name="username" label_name="Username" place_holder="username123"/>
                    <x-forms.input name="email" label_name="Email" place_holder="test@test.com" type="email"/>
                    <x-forms.input name="password" label_name="Password" place_holder="" type="password"/>
                    <x-forms.button value="Register"/>
                </form>

                {{--<div class="login__google">
                    <p class="login__separator"><span class="login__separator-content">Or</span></p>
                    <span class="login__google-link">
                        <x-svg.google/>
                        <a href="" title="Sign up with Google">Sign up with Google</a>
                    </span>
                </div>--}}

                <div class="login__option">
                    <span>Already have an account? <a href="{{ route('login') }}" title="Sign in">Log in</a></span>
                </div>
            </div>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










