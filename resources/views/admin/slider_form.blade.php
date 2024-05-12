@extends('admin.base')

@if ($slider->exists)
    @section('title','Modifier le slider')
@else
    @section('title','Ajouter un slider')
@endif
@section('content')
<h1 class="text-center text-secondary fw-bold">{{$slider->exists ? "Modifier le slider" : "Ajouter un slider"}}</h1>
<div class="row  d-flex justify-content-center" >

<form action="{{route($slider->exists ? 'admin.slider.update' : 'admin.slider.store',$slider)}}" method="post"   enctype="multipart/form-data">
    @csrf
    @method($slider->exists ? 'put' :'post')
<div id="row_form"  class="row w-100 d-flex justify-content-center">
    @include('shared.input',['label'=>'Entrez le nom du slider','name'=>'desciption','value'=>$slider->desciption])
    @include('shared.fileInput',['label'=>'Choississez une image ','name'=>'image'])
 
</div>
<button id="btn_ajout" class="btn btn w-25 mt-2 shadow-sm fw-bold">
    @if ($slider->exists)
        Modifier
    @else
        Ajouter la slider
    @endif
</button>
</form>
</div>
@endsection