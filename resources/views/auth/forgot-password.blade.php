<x-form.header :title="__('passwords.title')" />

<x-form.body :header="__('passwords.header')" :action="route('password.email')">


    @if(session()->has('status'))
        <p class="text">{{__(session('status'))}}</p>
    @else
        <p class="txt-lt text">{{__('passwords.forget')}}</p>
    @endif

    <x-form.email :placeholder="__('login.email')" class="text" />

    <input type="submit" value="{{__('passwords.get')}}" class="button">


</x-form.body>


<x-footer>

    <x-slot name="copyrights">
        <x-colorlib-copyrights></x-colorlib-copyrights>
    </x-slot>

    <x-slot name="script"> </x-slot>
</x-footer>
