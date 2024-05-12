@php
$class ??= null;

@endphp
<div @class(["form-check form-switch", $class])>
    <input type="hidden" value="0" name="{{$name}}" >
    <input @checked(old($name, $value ?? false)) type="checkbox" class="form-check-input @error($name) is-invalid @enderror" name="{{$name}}" role="switch" id="{{$name}}" value="1">
    <label class="form-check-label shadow-sm" for="{{$name}}">{{$label}}</label>
    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror

</div>
