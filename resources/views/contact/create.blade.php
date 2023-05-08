<x-layout>
    <x-header.page-header title="Contact support - Pentale"/>
    <main id="main" class="login support">
        <div class="login__container">
            <div class="o-wrapper">
                <div class="login__header">
                    <x-titles.section-title title="Contact support"/>
                    <p class="login__header-content">
                        Contact us if you have a question or you want to report a bug.
                    </p>
                </div>
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










