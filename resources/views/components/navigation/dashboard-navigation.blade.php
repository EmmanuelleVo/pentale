<div class="top top--dashboard">
    <div class="dn-wrapper">
        <div class="top__nav-logo top__nav-logo-dashboard">
            <a href="/" class="u-absolute"></a>
            <x-svg.site-logo/>
        </div>
        <nav class="nav nav--dashboard">
            <h2 role="heading" aria-level="2" class="u-visually-hidden">Main navigation</h2>
            <div class="nav__links">
                <button class="hamburger" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
                </button>

                <div class="nav__links-container">
                    <div class="nav__links-wrapper">
                        <x-navigation.link name="Dashboard" link="/dashboard">
                            <div class="svg">
                                <x-svg.home/>
                            </div>
                        </x-navigation.link>
                        <x-navigation.link name="My stories" link="/dashboard/novels">
                            <div class="svg svg-small">
                                <x-svg.chapter/>
                            </div>
                        </x-navigation.link>
                        <x-navigation.link name="Reviews" link="/dashboard/reviews">
                            <div class="svg">
                                <x-svg.reply-2/>
                            </div>
                        </x-navigation.link>
                        <x-navigation.link name="Comments" link="/dashboard/comments">
                            <div class="svg">
                                <x-svg.reply-1/>
                            </div>
                        </x-navigation.link>
                        <x-navigation.link name="Profile" link="/dashboard/profile/{{ auth()->user()->slug }}/edit">
                            <div class="svg">
                                <x-svg.profile/>
                            </div>
                        </x-navigation.link>
                        <x-navigation.link name="Logout" link="/dashboard/logout">
                            <div class="svg">
                                <x-svg.logout/>
                            </div>
                        </x-navigation.link>
                    </div>
                    <x-navigation.link name="Back to website" link="/"/>
                </div>
            </div>
        </nav>
    </div>
</div>
