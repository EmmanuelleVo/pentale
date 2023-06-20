<x-layout>
    @php
        $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
    @endphp
    @if($currentRoute === "profile.edit.dashboard")
        <x-header.dashboard-header title="My profile - Dashboard Pentale" :page_title="$page_title"/>
        <main id="main" class="dashboard">
            <div class="d-wrapper profile">

                <form method="post" action="/dashboard/profile/{{ $user->slug }}/update" class="form" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <livewire:file-input-avatar :photo="$user->avatar"/>
                    <x-forms.input name="username" label_name="Username" :placeholder="$user->username" :value="$user->username"/>
                    <x-forms.input name="email" label_name="Email" type="email" :placeholder="$user->email" :value="$user->email"/>
                    <x-forms.input name="password" label_name="Current password" type="password"/>
                    <x-forms.input name="password_confirmation" label_name="Password confirmation" type="password"/>

                    <div class="">
                        <x-forms.button value="{{ __('Save changes') }}"/>
                    </div>
                </form>

                @include('profile.partials.delete-user-form')
            </div>
        </main>
    @elseif($currentRoute === "profile.user:slug.edit")
        <x-header.profile-header title="My profile - Pentale"/>
        <main id="main" class="login profile">
            <div class="login__container">
                <div class="o-wrapper">

                    <form method="post" action="/dashboard/profile/{{ $user->slug }}/update" class="form" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <livewire:file-input-avatar :photo="$user->avatar"/>
                        <x-forms.input name="username" label_name="Username" :placeholder="$user->username" :value="$user->username"/>
                        <x-forms.input name="email" label_name="Email" type="email" :placeholder="$user->email" :value="$user->email"/>
                        <x-forms.input name="password" label_name="Current password" type="password"/>
                        <x-forms.input name="password_confirmation" label_name="Password confirmation" type="password"/>

                        <div class="">
                            <x-forms.button value="{{ __('Save changes') }}"/>
                        </div>
                    </form>

                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </main>
    @endif
</x-layout>
