<x-form.header :title="__('passwords.reset_title')" />

<x-form.body :header="__('passwords.reset_title')" :action="route('password.update')">
    <input
        type="hidden"
        name="token"
        value="{{ $request->route('token') }}"
    >

    <x-form.email class="text" :placeholder="__('register.email')"/>

    <x-form.password :placeholder="__('register.password')" />

    <x-form.password name="password_confirmation" :placeholder="__('register.passwordConfirm')" class="w3lpass"/>

    <input type="submit" value="{{__('passwords.reset_submit')}}">

</x-form.body>


    <x-footer>
        <x-slot name="copyrights">
            <x-colorlib-copyrights></x-colorlib-copyrights>
        </x-slot>

        <x-slot name="script">
        </x-slot>
    </x-footer>
