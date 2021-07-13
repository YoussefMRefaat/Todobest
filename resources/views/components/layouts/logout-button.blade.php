@props([
    'class' => ' ',
])

<form method="POST" action="{{route('logout')}}">
    @csrf
    <input type="submit" class="logout-button {{$class}}" value="Logout" >
</form>
