@props([
    'header' => ' ',
    'action',

])

    <h1>{{$header}}</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">
            <form action="{{$action}}" method="POST">
                @csrf
                {{$slot}}
            </form>

        </div>
    </div>
