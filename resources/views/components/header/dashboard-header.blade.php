@props(['title', 'button_name' => 'Create new story', 'button_link' => '/dashboard/stories', 'page_title' => ''])

<header class="header {{ route('dashboard') ? 'header--home' : 'header--dashboard' }}">
    <h1 aria-level="1" role="heading" class="u-visually-hidden">{{ $title ?? 'Dashboard - Pentale' }}</h1>
    <x-navigation.dashboard-navigation/>

    <div class="header__container">
        @if(route('dashboard'))
            <h2 aria-level="2" role="heading" class="title title--big">Welcome back to your <span class="colored">Dashboard</span></h2>
        @else
            <x-titles.section-title :title="$page_title"/>
        @endif
        <x-commons.button :title="$button_name" :link="$button_link"/>
    </div>


</header>
