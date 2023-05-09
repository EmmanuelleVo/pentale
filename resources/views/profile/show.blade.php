<x-layout>
    <x-header.profile-header :user="$user" title="Profile - Pentale"/>
    <main id="main" class="profile">
        <div class="o-wrapper">
            <div class="tab">
                <x-commons.tab class="tab__link--active" link="#activity" name="Activity"/>
                <x-commons.tab link="#reviews" name="Reviews"/>
                <x-commons.tab link="#works" name="Works"/>
            </div>

            <section id="Activity" class="tab__content tab__content--active">
                <x-profile.activity-tab />
            </section>
            <section id="Reviews" class="tab__content">
                {{--<x-profile.reviews-tab :reviews="$reviews"/>--}}
            </section>
            <section id="Works" class="tab__content">
                <x-profile.works-tab/>
            </section>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










