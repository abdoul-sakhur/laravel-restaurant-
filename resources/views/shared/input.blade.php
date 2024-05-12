@php 
$class??= null;
$name??= '';
$type??='text';
$label??='';
$value ??='';
@endphp
<div @class(['form-group', $class]) >
    <label for="$name">{{$label}}</label>
    <input class="form-control w-100 shadow-sm @error($name) is-invalid @enderror"  type="{{$type}}" name="{{$name}}" id="{{$name}}" value="{{old($name,$value)}}" >

    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
        
    @enderror
</div>
