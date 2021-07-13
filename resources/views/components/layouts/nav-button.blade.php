@props([
    'action' => ' ',
    'class' => ' ',
    'content' => ' '
])
    <a href="{{$action}}">
        <button class="nav-button {{$class}}">
            {{$content}}
        </button>
    </a>
