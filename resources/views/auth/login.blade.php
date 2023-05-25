<x-layout>
    <x-header.page-header title="Login - Pentale"/>
    <main id="main" class="login">
        <div class="login__container">
            <div class="o-wrapper">
                <div class="login__header">
                    <x-titles.section-title title="Login"/>
                    <p class="login__header-content">Welcome back !</p>
                </div>
                <form action="/login" method="post" class="form">
                    @csrf
                    <x-forms.input name="email" label_name="Email" place_holder="test@test.com" type="email"/>
                    <x-forms.input name="password" label_name="Password" place_holder="" type="password"/>
                    <span class="form__text"><a href="{{ route('forgotten-password') }}">Forgot your password?</a></span>
                    <x-forms.button value="Sign in"/>
                </form>

                <div class="login__google">
                    <p class="login__separator"><span class="login__separator-content">Or</span></p>
                    <span class="login__google-link">
                        <x-svg.google/>
                        <a href="" title="Sign in with Google">Sign in with Google</a>
                    </span>
                </div>

                <div class="login__option">
                    <span>New to Pentale? <a href="{{ route('register') }}" title="Create an account">Create an account</a></span>
                </div>
            </div>
            {{--<figure class="login__figure">
                <img src="" alt="" class="login__img">
            </figure>--}}
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










