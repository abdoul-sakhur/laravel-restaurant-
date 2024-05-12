@extends('admin.base')
@section('title','parametre')
@section('content')
<div class="row d-flex justify-content-center">

    <div class="col-4 p-4 " style="border-radius: 10px 0px 0px 10px; background-color:#fff;">
        <h3 class="text-center fw-bold" >Parametres</h3>
        <form action="{{route('update')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            @include('shared.input',['label'=>'Nom d\'utilisateur','name'=>'name','value'=>Auth::user()->name])
            @include('shared.input',['label'=>'Email','type'=>'email','name'=>'email','value'=>Auth::user()->email])
            @include('shared.input',['label'=>'Telephone','type'=>'number','name'=>'telephone','value'=>Auth::user()->telephone])
            @include('shared.input',['label'=>'Mot de passe','type'=>'password','name'=>'password'])
            @include('shared.fileInput',['label'=>'choisir une photo de profil','name'=>'image'])
            <input type="hidden"  name="role" value="admin">
            <button class="btn btn-info w-100 mt-2">Modifier</button>
        </form>
    
    </div>
    <div class="col-4 p-4  " style="border-radius: 10px 0px 0px 10px;">
    <img src="/storage/{{Auth::user()->image}}" alt="" srcset="" style="width: 100%" height="100%">
    </div>
</div>
    
@endsection