<x-layout>
    <x-header.page-header title="Contact support - Pentale"/>
    <main id="main" class="login support">
        <div class="login__container">
            <div class="o-wrapper">
                <noscript>
                    <div id="js-disabled-message">
                        <p>Please enable JavaScript in your browser to fully experience this website.</p>
                    </div>
                </noscript>
                <div class="login__header">
                    <x-titles.section-title title="Contact support"/>
                    <p class="login__header-content">
                        Contact us at <a href="mailto:info@pentale.com" title="Send a mail to pentale">info@pentale.com</a> if you have a question or you want to report a bug.
                    </p>
                </div>
                @if(session()->has('form-success'))
                <div class="form__success">
                    <p>{{ session('form-success') }}</p>
                </div>
                @endif
                <form action="/contact" method="post" class="form">
                    @csrf
                    <x-forms.input name="name" label_name="Name" place_holder="John Doe"/>
                    <x-forms.input name="email" label_name="Email" place_holder="test@test.com" type="email"/>
                    <x-forms.textarea name="message" label_name="Message" placeholder="Your question or bug ..."/>
                    <x-forms.button value="Send"/>
                </form>
            </div>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










