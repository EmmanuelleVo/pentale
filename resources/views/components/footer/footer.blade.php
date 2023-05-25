<footer class="footer">
    <div class="footer__wrapper o-wrapper">
        <span class="footer__copyright">© 2023 - All Right Reserved.</span>
        <div class="footer__nav">
            <x-navigation.link link="{{ route('contact') }}" name="Support" class="footer__nav__link-container"/>
            <x-navigation.link link="{{ route('about') }}" name="About" class="footer__nav__link-container"/>
            <x-navigation.link link="{{ route('terms-and-conditions') }}" name="Terms & Conditions" class="footer__nav__link-container"/>
            <x-navigation.link link="{{ route('privacy-policy') }}" name="Privacy Policies" class="footer__nav__link-container"/>
        </div>
    </div>
</footer>
