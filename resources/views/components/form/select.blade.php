@props([
    'name',
    'class' => ' ',
    'array',
    'element',
    'value',
    'content'
])

<select
    name="{{$name}}"
    class="select {{$class}}"
    >
    {{$slot}}
    @foreach($array as $$element)
        <option value="{{$$value}}">{{$$content}}</option>
    @endforeach
</select>
@error($name)
    <p class="text">{{$message}}</p>
@enderror
