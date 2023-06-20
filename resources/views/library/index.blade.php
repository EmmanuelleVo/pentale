<x-layout>
    <x-header.page-header title="My library - Pentale"/>
    <main id="main" class="library">
        <div class="o-wrapper">
            <noscript>
                <div id="js-disabled-message">
                    <p>Please enable JavaScript in your browser to fully experience this website.</p>
                </div>
            </noscript>
            <x-titles.page-title class="title--top" title="My library"/>
            @livewire('library')
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










