<x-form.header :title="__('update.passwordTitle')" />

<x-layouts.logout-button />

<x-layouts.nav-button :action="route('home')" content="Home" />

<x-form.body :header="__('update.passwordHeader')" :action="route('updatePassword')">
    @method('PATCH')

    <x-form.password name="old_password" :placeholder="__('update.passwordVerify')" />

    <x-form.password :placeholder="__('update.newPassword')" />

    <x-form.password name="password_confirmation" :placeholder="__('update.newPasswordConfirm')" />

    <input type="submit" value="{{__('update.submit')}}">

    <p><a href="{{route('updateUser')}}">Update general information</a></p>
</x-form.body>

    <x-footer>
        <x-slot name="copyrights">
            <x-colorlib-copyrights></x-colorlib-copyrights>
        </x-slot>

        <x-slot name="script">
        </x-slot>
    </x-footer>
