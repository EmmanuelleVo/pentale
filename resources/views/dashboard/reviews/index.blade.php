<x-layout>
    <x-header.dashboard-home-header title="All reviews - Pentale"/>
    <main id="main" class="dashboard">
        <div class="o-wrapper">

            <div class="">
                <section class="dashboard__reviews">
                    <div class="dashboard__reviews-container title-container">
                        <x-titles.section-title title="Latest reviews"/>
                    </div>
                    <livewire:dashboard.review-index/>

                </section>

            </div>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










