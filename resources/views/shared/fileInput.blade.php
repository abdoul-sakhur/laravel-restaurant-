@php
    $name??= '';
    $label??='';
@endphp
<div class="form-group">

        <label for="{{$name}}">{{$label}}</label>
        <input class="form-control w-100 shadow-sm mb-2 mt-2 @error($name) is-invalid @enderror" type="file" id="{{$name}}" name="{{$name}}">

     @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>