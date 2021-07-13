@props([
    'name' => 'password',
    'placeholder' => 'Password',
    'class' => ' '
])

<input
    class="text {{$class}}"
    type="password"
    name="{{$name}}"
    placeholder="{{$placeholder}}"
    required>

@error($name)
<p class="text">{{$message}}</p>
@enderror
