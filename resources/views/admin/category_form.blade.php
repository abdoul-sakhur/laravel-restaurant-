@extends('admin.base')

@if ($category->exists)
    @section('title','Modifier le categorie')
@else
    @section('title','Ajouter un categorie')
@endif
@section('content')
<h1 class="text-center text-secondary fw-bold">{{$category->exists ? "Modifier le categorie" : "Ajouter un categorie"}}</h1>
<div class="row  d-flex justify-content-center" >

<form action="{{route($category->exists ? 'admin.category.update' : 'admin.category.store',$category)}}" method="post"   enctype="multipart/form-data">
    @csrf
    @method($category->exists ? 'put' :'post')
<div id="row_form"  class="row w-100 d-flex justify-content-center">
    @include('shared.input',['label'=>'Entrez le nom du categorie','name'=>'name','value'=>$category->name])
    @include('shared.fileInput',['label'=>'Choississez une image tertiaire','name'=>'image'])
 
</div>
<button id="btn_ajout" class="btn btn w-25 mt-2 shadow-sm fw-bold">
    @if ($category->exists)
        Modifier
    @else
        Ajouter la categorie
    @endif
</button>
</form>
</div>
@endsection