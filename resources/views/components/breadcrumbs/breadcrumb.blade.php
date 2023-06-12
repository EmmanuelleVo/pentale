<div class="breadcrumb">
    <ul {{ $attributes->merge(['class' => 'breadcrumb__list']) }}
         itemscope itemtype="https://schema.org/BreadcrumbList">
        @if(!str_contains(url()->current(), '/dashboard'))
            <x-breadcrumbs.breadcrumb-link title="Home" link="/" index="1"/>
            <x-breadcrumbs.breadcrumb-separator/>
        @endif
        {{ $slot }}
    </ul>
</div>
