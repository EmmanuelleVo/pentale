<div class="top">
    <div class="o-wrapper">
        <div class="top__nav-logo">
            <a href="/" class="u-absolute"></a>
            {{--<img src="" alt="Logo Pentale">--}}
            <x-svg.site-logo/>
        </div>
        <nav class="nav">
            <h2 role="heading" aria-level="2" class="u-visually-hidden">Main navigation</h2>
            <div class="nav__links">
                <button class="hamburger" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
                </button>

                <div class="nav__links-container">
                    <x-navigation.sub-navigation name="Read">
                        <x-navigation.sublink name="Most popular novels" link="/novels"/>
                        <x-navigation.sublink name="Latest Releases" link="/novels"/>
                        <x-navigation.sublink name="Newest novels" link="/novels"/>
                    </x-navigation.sub-navigation>
                    <x-navigation.link name="Write" link="/"/>
                    <x-navigation.link name="Forum" link="/forum"/>
                    @auth()
                        <x-navigation.link name="My library" link="/library"/>
                    @endauth

                    <x-forms.nav-search />

                    @guest()
                        <x-navigation.link name="Login" link="/login"/>
                    @endguest
                    @auth()
                        <x-navigation.sub-navigation name="{{ auth()->user()->username }}">
                            <x-navigation.sublink name="My profile" link="/profile"/>
                            <x-navigation.sublink name="Notifications" link="/notifications"/>
                            <form action="/logout" method="post" class="form">
                                @csrf
                                <button class="nav__sublink">
                                    <span class="nav__sublink__label">Logout</span>
                                </button>
                            </form>
                        </x-navigation.sub-navigation>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</div>
