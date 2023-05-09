@props(['user'])

<header class="header header--profile">
    <h1 aria-level="1" role="heading" class="u-visually-hidden">{{ $title ?? 'Pentale' }}</h1>
    <x-navigation.navigation/>

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
</header>
