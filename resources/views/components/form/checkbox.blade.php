@props([
    'class' => ' ',
    'name' => ' ',
    'description' => ' ',
    'required' => ' '
])

<div class="wthree-text">

    <label class="anim">
        <input type="checkbox" class="checkbox" name="{{$name}}" {{$required}}>
        <span>{{$description}}</span>
    </label>

    @error($name)
    <p class="text">{{$message}}</p>
    @enderror

    <div class="clear"> </div>

</div>
