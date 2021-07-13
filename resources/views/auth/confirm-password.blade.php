
<x-form.header :title=" __('auth.title')" />

<x-layouts.logout-button />

<x-layouts.nav-button :action="route('home')" content="Home" />

<x-form.body :header="__('auth.header')" :action="route('password.confirm')" >

    <p class="text">{{__('auth.secure')}}</p>

    <x-form.password :placeholder="__('login.password')"/>

    <input type="submit" value="{{__('auth.confirm')}}" class="button">


</x-form.body>


<x-footer>
    <x-slot name="script">
    </x-slot>

    <x-slot name="copyrights">
        <x-colorlib-copyrights></x-colorlib-copyrights>
    </x-slot>
</x-footer>

