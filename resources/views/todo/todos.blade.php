<x-header>
    <x-slot name="title">{{__('todos.title')}}</x-slot>
    <x-slot name="css">
        <!-- Import Roboto Font form Google Fonts Api  -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

        <!-- Import FontAwesome to Use Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">

        <!-- Custom CSS Style -->
        <link href="{{asset('css/todos.css')}}" rel="stylesheet">

        <!-- X-CSRF-TOKEN header to be sent in AJAX requests -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </x-slot>
</x-header>

<a href="{{route('updateUser')}}"><button class="update-button">{{__('todos.user-update')}}</button> </a>

<form method="POST" action="{{route('logout')}}">
    @csrf
    <input type="submit" class="logout-button" value="{{__('auth.logout')}}" >
</form>


<div id="container">
    <!-- heading -->
    <h1>{{__('todos.header')}} <i class="fa fa-plus"></i></h1>

    @if(session()->get('_previous.url') === route('verification.notice'))
        <p>Your account is activated</p>
    @endif


    <!-- text input field which takes content of a todo -->
    <input type="text" placeholder="{{__('todos.new')}}" name="content" id="todo">

    <!-- button to add a todo to the database -->
    <input onclick="add()" class="button" type="submit" value="Add">

    {{--    code to be executed if user has todo(s)--}}
    @if(!empty($todos))

        <ul>
        {{--        looping through todos--}}

        @foreach($todos as $todo)
            {{--                 every loop echos a list item--}}

            <!-- list item which holds a todo -->
                <li
                    id="todo{{$todo->id}}"
                    {{--                    if todo is done set attribute class=completed--}}
                    @if($todo->is_done)
                    class="completed"
                    @endif
                >
                    <!-- delete icon -->
                    <a onclick="del({{$todo->id}})">
                        <span class="delete"><i class="fa fa-trash"></i></span>
                    </a>

                    <!-- todo content -->
                    <span>{{$todo->content}}</span>


                        <div class="done-div" id="div{{$todo->id}}">
                            <a onclick="done({{$todo->id}})" id="icon{{$todo->id}}">
{{--                                if todo is not done show done icon --}}
                                @if(!$todo->is_done)
                                    <!-- done icon -->
                                        <span class="done"><i class="fa fa-check"></i></span>
{{--                                        if todo is done show undone icon--}}
                                @else
                                    <!-- undone icon -->
                                        <span class="undone"><i class="fa fa-times"></i></span>
                                @endif
                            </a>
                        </div>
                </li>
            @endforeach
        </ul>
    @endif

</div>

<!-- Footer -->
<x-footer>
    <x-slot name="copyrights"></x-slot>
    <x-slot name="script">
        <!-- include AJAX file -->
        <script src="{{asset('js/todos.js')}}"></script>

    </x-slot>
</x-footer>

