@php 
$class??= null;
$name??= '';
$type??='text';
$label??='';
$value ??='';
@endphp
<div @class(['form-group', $class]) >
    <label for="$name">{{$label}}</label>
    <textarea style="shadow-box:none; border:none; background-color:#eef8ff;" class="form-control shadow-sm w-100  @error($name) is-invalid @enderror"  name="{{$name}}" id="{{$name}}"  style="width: 100%">{{old($name,$value)}}</textarea>

    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
        
    @enderror
</div>
