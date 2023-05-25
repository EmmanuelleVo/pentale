<x-layout>
    <x-header.dashboard-header title="My stories - Pentale"/>
    <main id="main" class="dashboard">
        <div class="o-wrapper">
            <div class="dashboard__stories">
                <div class="dashboard__stories-list card-list">
                    @foreach($books as $book)
                        <x-cards.dashboard.story :book="$book"/>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










