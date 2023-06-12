@props(['title', 'button_name' => 'Create new story',
'button_link' => '/dashboard/novels/create',
'page_title' => '',
'book' => ''
])

@php
    $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
@endphp

<header class="header header--dashboard">
    <h1 aria-level="1" role="heading" class="u-visually-hidden">{{ $title ?? 'Dashboard - Pentale' }}</h1>
    <x-navigation.dashboard-navigation/>

    <div class="header__container--dashboard">
        <div class="d-wrapper title-container title-container--mobile">
            <h2 aria-level="2" role="heading" class="title title--big">
                {{ $page_title }}
            </h2>
            @if($currentRoute === 'dashboard.novels.book:slug')
                <x-commons.button title="{{ __('Create new chapter') }}"
                                  link="/dashboard/novels/{{ $book->slug }}/create">{{ __('Create new chapter') }}</x-commons.button>
            @else
                <x-commons.button :title="$button_name" :link="$button_link">{{ $button_name }}</x-commons.button>
            @endif
        </div>
        <div class="d-wrapper">
            <x-breadcrumbs.breadcrumb>
                <x-breadcrumbs.breadcrumb-link title="Dashboard" link="/dashboard" index="1"/>
                {{--@dd(\Illuminate\Support\Facades\Route::currentRouteName())--}}
                @if($currentRoute === 'dashboard.novels')
                    <x-breadcrumbs.breadcrumb-separator/>
                    <x-breadcrumbs.breadcrumb-link title="My novels" link="/dashboard/novels" index="2"/>
                @elseif($currentRoute === 'dashboard.novels.book:slug')
                    <x-breadcrumbs.breadcrumb-separator/>
                    <x-breadcrumbs.breadcrumb-link title="My novels" link="/dashboard/novels" index="2"/>
                    <x-breadcrumbs.breadcrumb-separator/>
                    <x-breadcrumbs.breadcrumb-link :title="\Illuminate\Support\Str::limit($book->title, 40, $end='...')"
                                                   link="/dashboard/novels/{{ $book->slug }}" index="3"/>
                @elseif($currentRoute === 'book.create')
                    <x-breadcrumbs.breadcrumb-separator/>
                    <x-breadcrumbs.breadcrumb-link title="My novels" link="/dashboard/novels" index="2"/>
                    <x-breadcrumbs.breadcrumb-separator/>
                    <x-breadcrumbs.breadcrumb-link title="Create new story" link="/dashboard/novels/create" index="3"/>
                @elseif($currentRoute === 'book.edit')
                    <x-breadcrumbs.breadcrumb-separator/>
                    <x-breadcrumbs.breadcrumb-link title="My novels" link="/dashboard/novels" index="2"/>
                    <x-breadcrumbs.breadcrumb-separator/>
                    <x-breadcrumbs.breadcrumb-link title="{{ $book->title }}" link="/dashboard/novels/{{ $book->slug }}" index="3"/>
                    <x-breadcrumbs.breadcrumb-separator/>
                    <x-breadcrumbs.breadcrumb-link title="Edit story" link="/dashboard/novels/{{ $book->slug }}/edit" index="4"/>
                @elseif($currentRoute === 'profile.edit.dashboard')
                    <x-breadcrumbs.breadcrumb-separator/>
                    <x-breadcrumbs.breadcrumb-link title="My profile" link="/dashboard/profile/{{ auth()->user()->slug }}" index="2"/>
                @endif
            </x-breadcrumbs.breadcrumb>
        </div>
    </div>


</header>
