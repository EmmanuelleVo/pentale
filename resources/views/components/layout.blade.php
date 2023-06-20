<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta name="author" content="Pentale">
    {!! Meta::toHtml() !!}
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon-16x16.png">
    <link rel="manifest" href="/img/site.webmanifest">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href=" https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @livewireStyles
    <x-head.tinymce-config/>
</head>
<body itemscope itemtype="https://schema.org/Organization" class="sans text-lg bg-white overflow-x-hidden leading-9">
<a href="#main" title="Go to main content" class="u-visually-hidden">Go to main content</a>
{{ $slot }}
<x-commons.flash-message/>
@livewireScripts
<script src="{{ asset('js/app.js') }}" defer></script>
<script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Website",
      "name": "Pentale",
      "author": {
        "@type": "Organization",
        "name": "Pentale",
        "email": "info@pentale.com"
      },
      "description": "Pentale is a website where you can write books that can be read by others."
    }
</script>
</body>

</html>
