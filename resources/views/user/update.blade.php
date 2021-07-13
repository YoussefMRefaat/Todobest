<x-form.header :title="__('update.title')" />

<x-layouts.logout-button />

<x-layouts.nav-button :action="route('home')" content="Home" />


<x-form.body :header="__('update.header')" :action="route('updateUser')">
    @method('PATCH')

    <x-form.password :placeholder="__('update.passwordVerify')" />

    <x-form.name :value="$user->name" />

    <x-form.email class="text" :value="$user->email" />

    <x-form.select name="timezone" :array="timezone_identifiers_list()" element="timezone"
                   value="timezone" content="timezone">
        <option value="{{$user->timezone}}">{{$user->timezone}}</option>
    </x-form.select>

    <input type="submit" value="{{__('update.submit')}}">

    <p><a href="{{route('updatePassword')}}">Update password</a></p>

</x-form.body>



    <x-footer>
        <x-slot name="copyrights">
            <x-colorlib-copyrights></x-colorlib-copyrights>
        </x-slot>

        <x-slot name="script">
        </x-slot>
    </x-footer>
