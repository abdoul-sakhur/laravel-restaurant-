@php 
$class??= null;
$name??= '';
$type??='text';
$label??='';
$value ??='';
@endphp
<div @class(['form-group', $class]) >
    <label for="$name">{{$label}}</label>
<select class=" w-100 shadow-sm border-0 p-2 rounded-1 outline-0 @error($name) is-invalid @enderror"  name="{{$name}}" id="select-state"  >
    
    @foreach ($categories as $key =>$val  )
        <option @selected($value->contains($key)) value="{{$key}}">{{$val}}</option>
    @endforeach
    
    </select>




    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
        
    @enderror
</div>
