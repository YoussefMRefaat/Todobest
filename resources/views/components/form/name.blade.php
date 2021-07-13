@props([
    'name' => 'name' ,
    'placeholder' => '',
    'class' => '',
    'value' => '',
])

<input
    class="text {{$class}}"
    type="text"
    name="{{$name}}"
    placeholder="{{$placeholder}}"
    value="{{$value}}"
    autocomplete="off"
    required
>

@error($name)
<p class="text">{{$message}}</p>
@enderror
