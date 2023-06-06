<x-layout>
    <x-header.profile-header :user="$user" title="Profile - Pentale"/>
    <main id="main" class="profile">
        <div class="o-wrapper">
            <form action="/profile/{{ $user->slug }}/update" class="form profile__form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form__container">
                    <x-forms.input type="file" label_name="Avatar" name="avatar"/>
                </div>
                <div class="form__container">
                    <x-forms.input label_name="Username" name="username"/>
                    <x-forms.input type="email" label_name="Email" name="email"/>
                    <x-forms.input type="password" label_name="Reset password" name="password"/>
                    <x-forms.input type="password" label_name="Confirm new password" name="password_confirmation"/>

                    <x-forms.button value="Save changes"/>
                </div>
            </form>
        </div>
    </main>
    <x-footer.footer/>
</x-layout>










