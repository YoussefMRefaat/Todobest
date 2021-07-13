<x-form.header :title="__('register.title')" />

            <x-form.body :header="__('register.header')" :action="route('register')">

                <x-form.name :placeholder="__('register.name')" :value="old('name')" />

                <x-form.email :placeholder="__('register.email')" class="text" :value="old('email')" />

                <x-form.password :placeholder="__('register.password')" />

                <x-form.password name="password_confirmation" :placeholder="__('register.passwordConfirm')" />

                <x-form.select name="timezone" :array="timezone_identifiers_list()" element="timezone"
                               value="timezone" content="timezone">
                    <option disabled selected>{{__('register.timezone')}}</option>
                </x-form.select>

                <x-form.checkbox name="agree" :description="__('register.agree')" required="required"/>

                <input type="submit" value="{{__('register.submit')}}">


                <p> {{__('register.haveAccount')}}
                    <a href="{{route('login')}}">
                        {{__('register.login')}}
                    </a>
                </p>

            </x-form.body>




<x-footer>
    <x-slot name="copyrights">
        <x-colorlib-copyrights></x-colorlib-copyrights>
    </x-slot>
    <x-slot name="script" ></x-slot>
</x-footer>
