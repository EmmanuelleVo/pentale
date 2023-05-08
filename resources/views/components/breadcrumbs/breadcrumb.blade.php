<div class="breadcrumb">
    <ul {{ $attributes->merge(['class' => 'breadcrumb__list']) }}
         itemscope itemtype="https://schema.org/BreadcrumbList">
        <x-breadcrumbs.breadcrumb-link title="Home" link="/" index="1"/>
        <x-breadcrumbs.breadcrumb-separator/>
        {{ $slot }}
    </ul>
</div>
