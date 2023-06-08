<x-layout>
    <x-header.chapter-header :chapters="$chapters" :book="$book" :chapter="$chapter" title="{{ $chapter->title }} - Pentale"/>
    <main id="main" class="chapter">
        <livewire:chapter-show :book="$book" :chapter="$chapter" :fonts="$fonts"/>
    </main>
    <x-footer.footer/>
</x-layout>
