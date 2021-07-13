<x-form.header :title=" __('login.title')" />


<x-form.body :header="__('login.header')" :action="route('login')">
    @if(session()->get('url.intended') === route('verification.notice'))
        <p>Please login first</p>
    @endif

    <x-form.email :placeholder="__('login.email')" class="text" :value="old('email')" />

    <x-form.password :placeholder="__('login.password')" />

    <x-form.checkbox name="remember" :description="__('login.remember')" />


        <p>
            {{__('login.forget')}}<a href="{{route('password.request')}}"> {{__('login.reset')}}</a>
        </p>

        <input type="submit" value="{{__('login.submit')}}" class="button">

        <p>{{__('login.registered')}}
            <a href="{{route('register')}}">{{__('login.register')}}</a>
        </p>

</x-form.body>



<x-footer>
    <x-slot name="script" > </x-slot>

    <x-slot name="copyrights">
        <x-colorlib-copyrights></x-colorlib-copyrights>
    </x-slot>
</x-footer>

