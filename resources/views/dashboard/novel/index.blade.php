<x-layout>
    <x-header.dashboard-header title="My stories - Pentale" page_title="My stories"/>
    <main id="main" class="dashboard">
        <div class="o-wrapper">
            <div class="dashboard__stories">
                @if(count($books) > 0)
                    <div class="dashboard__stories-list card-list">
                        @foreach($books as $book)
                            <x-cards.dashboard.story :book="$book"/>
                        @endforeach
                    </div>

                @else
                    <x-commons.no-collection>You have no story yet.</x-commons.no-collection>
                @endif
            </div>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










