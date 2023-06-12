<x-layout>
    <x-header.dashboard-header title="My profile - Pentale"/>
    <main id="main" class="dashboard">
        <div class="d-wrapper profile">
            <div class="profile">
                @include('profile.partials.update-profile-information-form')

                @include('profile.partials.update-password-form')

                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </main>
</x-layout>
