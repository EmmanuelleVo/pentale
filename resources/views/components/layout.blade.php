<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta name="author" content="Pentale">
    {!! Meta::toHtml() !!}
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/img/site.webmanifest">
    {{--@vite(['resources/js/app.ts', 'js/tinymce/tinymce.min.js'])--}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @livewireStyles
    <x-head.tinymce-config/>
</head>
<body itemscope itemtype="https://schema.org/Organization" class="sans text-lg bg-white overflow-x-hidden leading-9">
<a href="#main" title="Aller au contenu principal" class="sr-only"></a>
{{ $slot }}

{{--<x-commons.flash-message/>--}}
@livewireScripts
<script src="{{ asset('js/main.js') }}" defer></script>
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
