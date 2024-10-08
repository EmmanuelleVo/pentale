@props(['title', 'button_name' => 'Create new story', 'button_link' => '/dashboard/novels/create', 'page_title' => ''])

@php
    $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
@endphp

<header class="header header--dashboard">
    <h1 aria-level="1" role="heading" class="u-visually-hidden">{{ $title ?? 'Dashboard - Pentale' }}</h1>
    <x-navigation.dashboard-navigation/>

    <div class="header__container--dashboard">
        <div class="d-wrapper title-container title-container--mobile">

            @if($currentRoute === 'dashboard.reviews')
                <h2 aria-level="2" role="heading" class="title title--big">Reviews</span>
                </h2>
            @elseif($currentRoute === 'dashboard')
                <h2 aria-level="2" role="heading" class="title title--big">Welcome back to your <span class="colored">Dashboard</span>
                </h2>
            @endif
            <x-commons.button :title="$button_name" :link="$button_link">{{ $button_name }}</x-commons.button>
        </div>
    </div>


</header>
