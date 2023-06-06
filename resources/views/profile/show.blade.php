<x-layout>
    <x-header.profile-header :user="$user" title="Profile - Pentale"/>
    <main id="main" class="profile">
        <div class="header header--profile">
            <div class="o-wrapper header__container">
                <div class="header__wrapper">
                    <x-titles.section-title title="My profile" />
                    <div class="header__content">
                        <div class="header__avatar">
                            <figure class="header__figure avatar">
                                <img src="{{ $user->avatar }}" alt="{{ $user->username }}'s avatar" class="header__img">
                            </figure>
                            <span class="header__date">Member since {{ $user->created_at }}</span>
                        </div>
                        <div class="header__meta">
                            <x-commons.meta-text-big number="134" term="books read"/>
                            <x-commons.meta-text-big number="1324" term="chapters read"/>
                            <x-commons.meta-text-big number="39" term="comments"/>
                        </div>
                        <div class="header__actions">
                            <a href="/profile/{{ $user->slug }}/edit" title="Edit your profile">
                                ... edit
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="o-wrapper" x-data="{ tab: window.location.hash ? window.location.hash : '#activity' }">
            <div class="tab">
                <a id="tabLink" href="#activity"
                   @click="tab='#activity'"
                   :class="{[tab==='#activity']: 'tab__link--active'}"
                   class="tab__link"> Activity
                </a>
                <a id="tabLink" href="#reviews"
                   @click="tab='#reviews'"
                   :class="{[tab==='#reviews']: 'tab__link--active'}"
                   class="tab__link"> Reviews
                </a>
                <a id="tabLink" href="#works"
                   @click="tab='#works'"
                   :class="{[tab==='#works']: 'tab__link--active'}"
                   class="tab__link"> Works
                </a>
            </div>

            <section x-show="tab === '#activity'" x-cloak id="Activity" class="tab__content tab__content--active">
                <x-profile.activity-tab />
            </section>
            <section x-show="tab === '#reviews'" x-cloak id="Reviews" class="tab__content">
                {{--<x-profile.reviews-tab :reviews="$reviews"/>--}}
            </section>
            <section x-show="tab === '#works'" x-cloak id="Works" class="tab__content">
                <x-profile.works-tab/>
            </section>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










