@props([
    'title'
])

<x-header title="{{$title}}">
    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </x-slot>
</x-header>
