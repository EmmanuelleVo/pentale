<div class="top top--dashboard">
    <div class="o-wrapper">
        <div class="top__nav-logo">
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
                        <x-navigation.link name="Dashboard" link="/dashboard"/>
                        <x-navigation.link name="My stories" link="/dashboard/novels"/>
                        <x-navigation.link name="Reviews" link="/dashboard/reviews"/>
                        <x-navigation.link name="Comments" link="/dashboard/comments"/>
                        <x-navigation.link name="Settings" link="/dashboard/settings"/>
                        <x-navigation.link name="Logout" link="/dashboard/logout"/>
                    </div>
                    <x-navigation.link name="Back to website" link="/"/>
                </div>
            </div>
        </nav>
    </div>
</div>
