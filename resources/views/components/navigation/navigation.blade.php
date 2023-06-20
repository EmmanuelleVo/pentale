<div class="top">
    <div class="o-wrapper">
        <div class="top__nav-logo">
            <a href="/" class="u-absolute" title="Go to home page"></a>
            <x-svg.site-logo/>
        </div>
        <nav class="nav" role="navigation" aria-label="Main Navigation">
            <h2 role="heading" aria-level="2" class="u-visually-hidden">Main navigation</h2>
            <div class="nav__links">
                <button id="menubutton" class="hamburger" type="button" aria-label="Menu button" aria-haspopup="menu" aria-controls="navnemu">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
                </button>

                <div class="nav__links-container" aria-labelledby="menubutton" id="navnemu">
                    <x-navigation.sub-navigation name="Read">
                        <x-navigation.sublink name="Most popular novels" link="/novels?sort=popular"/>
                        <x-navigation.sublink name="Latest Releases" link="/novels?sort=latest-releases"/>
                        <x-navigation.sublink name="Newest novels" link="/novels?sort=newest-novels"/>
                    </x-navigation.sub-navigation>
                    <x-navigation.link name="Write" link="{{ route('dashboard') }}"/>
                    {{--<x-navigation.link name="Forum" link="/forum"/>--}}
                    @auth()
                        <x-navigation.link name="My library" link="/library"/>
                    @endauth
                    <div class="searchContainer">
                        <x-forms.nav-search />
                    </div>

                    @guest()
                        <x-navigation.link name="Login" link="/login"/>
                    @endguest
                    @auth()
                        <x-navigation.sub-navigation name="{{ auth()->user()->username }}">
                            <x-navigation.sublink name="My profile" link="/profile/{{ auth()->user()->slug }}/edit"/>
                            {{--<x-navigation.sublink name="Notifications" link="/notifications"/>--}}
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
