@props(['title',
'page_title' => '',
'book' => '',
])

@php
    $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
@endphp

<header class="header header--dashboard">
    <h1 aria-level="1" role="heading" class="u-visually-hidden">{{ $title ?? 'Dashboard - Pentale' }}</h1>
    <x-navigation.dashboard-navigation/>

    <div class="header__container--dashboard">
        <div class="d-wrapper title-container">
            <h2 aria-level="2" role="heading" class="title title--big">
                {{ $page_title }}
            </h2>
            {{--<div>
                <x-commons.button title="Save" link="">Save</x-commons.button>
                <x-commons.button title="Publish" link="">Publish</x-commons.button>
            </div>--}}
        </div>
        <div class="d-wrapper">
            <x-breadcrumbs.breadcrumb>
                <x-breadcrumbs.breadcrumb-link title="Dashboard" link="/dashboard" index="2"/>
                    <x-breadcrumbs.breadcrumb-separator/>
                    <x-breadcrumbs.breadcrumb-link title="My novels" link="/dashboard/novels" index="3"/>
                    <x-breadcrumbs.breadcrumb-separator/>
                    <x-breadcrumbs.breadcrumb-link :title="\Illuminate\Support\Str::limit($book->title, 40, $end='...')"
                                                   link="/dashboard/novels/{{ $book->slug }}" index="4"/>
                    <x-breadcrumbs.breadcrumb-separator/>
                <x-breadcrumbs.breadcrumb-link title="Create new chapter"
                                               link="/dashboard/novels/{{ $book->slug }}/create" index="5"/>

            </x-breadcrumbs.breadcrumb>
        </div>
    </div>


</header>
