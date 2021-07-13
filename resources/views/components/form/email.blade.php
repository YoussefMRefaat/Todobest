@props([
    'name' => 'email',
    'placeholder' => '',
    'class' => ' ',
    'value' => ' ',
])

<input
    class="email {{$class}}"
    type="email"
    name="{{$name}}"
    placeholder="{{$placeholder}}"
    value="{{$value}}"
    autocomplete="off"
    required
>

@error($name)
<p class="text">{{$message}}</p>
@enderror

