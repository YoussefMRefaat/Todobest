

<x-form.header :title="__('auth.verify_title')" :header="__('auth.verify_header')" />

<x-layouts.logout-button />


<x-form.body :header="__('auth.verify_header')" :action="route('verification.send')">

    @if(session()->has('status'))
        <p class="text">{{__('auth.sent')}}</p>
    @else
        <p class="text">{{__('auth.message')}}</p>
    @endif

    <input type="submit" value="{{__('auth.resend')}}" class="button">



</x-form.body>


    <x-footer>
        <x-slot name="script">
        </x-slot>

        <x-slot name="copyrights">
            <x-colorlib-copyrights></x-colorlib-copyrights>
        </x-slot>
    </x-footer>

