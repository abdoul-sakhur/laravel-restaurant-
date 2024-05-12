@extends('admin.base')

@if ($product->exists)
    @section('title','Modifier le plat')
@else
    @section('title','Ajouter un plat')
@endif
@section('content')
<h1 class="text-center text-secondary fw-bold">{{$product->exists ? "Modifier le plat" : "Ajouter un plat"}}</h1>
<div class="row  d-flex justify-content-center" >

<form action="{{route($product->exists ? 'admin.product.update' : 'admin.product.store',$product)}}" method="post"   enctype="multipart/form-data">
    @csrf
    @method($product->exists ? 'put' :'post')
<div id="row_form"  class="row w-100 d-flex justify-content-center">
    @include('shared.input',['label'=>'Entrez le nom du plat','name'=>'name','value'=>$product->name])
    @include('shared.input',['label'=>'Entrez le prix du plat','type'=>'number','name'=>'price','value'=>$product->price])
    @include('shared.textarea',['label'=>'Entrez la description  du plat','name'=>'description','value'=>$product->description])
    @include('shared.fileInput',['label'=>'Choississez une image principale','name'=>'imageP',])
    @include('shared.fileInput',['label'=>'Choississez une image secondaire','name'=>'imageS'])
    @include('shared.fileInput',['label'=>'Choississez une image tertiaire','name'=>'imageT'])
    @include('shared.select',['label'=>'Choississez une categorie','name'=>'category','value'=>$product->categories()->pluck('id'),'catgeories'=>$categories])
    @include('shared.toggle',['label'=>'disponible en stock ?','name'=>'stock','value'=>$product->stock])
    @include('shared.input',['label'=>'Notez la qualite sur 6','name'=>'quality','value'=>$product->quality])
 
</div>
<button id="btn_ajout" class="btn btn w-25 mt-2 shadow-sm fw-bold">
    @if ($product->exists)
        Modifier
    @else
        Ajouter le plat
    @endif
</button>
</form>
</div>
@endsection