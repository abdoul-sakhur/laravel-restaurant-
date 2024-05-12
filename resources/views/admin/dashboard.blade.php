@extends('admin.base')
@section('title','Dashboard')
@section('content')
<h2 class="text-center fw-bold">Dashboard</h2>
<div class="row d-flex justify-content-center mt-2">
    @if (session('success'))
                
    <div class="alert alert text-center" role="alert" style="border-left: 5px solid rgb(41, 230, 41); background-color:rgb(198, 255, 198); ">
        {{session('success')}}
       </div>
    @endif
    <div class="card overview w-75 rounded-2 shadow-sm" style=" border-left:5px solid rgb(114, 250, 182) ; border-right:5px solid rgb(114, 250, 182) ;">
        <h2>Bienvenue <span class="fw-bold" style="color:#98d1f9;">{{Auth::user()->name}}  <img src="{{asset('icons/012-chef.png')}}" width="40px" height="40px" alt=""></span></h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere, cumque.</p>
    </div>
</div>
<div class="row gap-4 d-flex justify-content-center mt-4">
    <div class="card dashcard rounded-2 shadow-sm" style=" border-left:5px solid salmon ;">
        <h5 class="text-center" >Nombre de categories</h5>
        <h4 class="text-center fw-bold">{{$categories}}</h4>
    </div>
    <div class="card dashcard rounded-2 shadow-sm" style=" border-left:5px solid green ;">
        <h5 class="text-center">Nombre de produits</h5>
        <h4 class="text-center fw-bold">{{$products}}</h4>
    </div>
    <div class="card dashcard rounded-2 shadow-sm" style=" border-left:5px solid lightblue ;">
        <h5 class="text-center">Nombre de sliders</h5>
        <h4 class="text-center fw-bold">{{$sliders}}</h4>
    </div>
    <div class="card dashcard rounded-2 shadow-sm" style=" border-left:5px solid rgb(213, 173, 230) ;">
        <h5 class="text-center">Nombre d'utilisateurs</h5>
        <h4 class="text-center fw-bold">{{$users}}</h4>
    </div>
    <div class="card dashcard rounded-2 shadow-sm" style=" border-left:5px solid rgb(173, 230, 177) ;">
        <h5 class="text-center">Nombre de commandes</h5>
        <h4 class="text-center fw-bold">{{$commande}}</h4>
    </div>
    <div class="card dashcard rounded-2 shadow-sm" style=" border-left:5px solid rgb(230, 173, 212) ;">
        <h5 class="text-center">Nombre de tables reserv.</h5>
        <h4 class="text-center fw-bold">{{$reservation}}</h4>
    </div>
       
</div>
<div class="row d-flex justify-content-center mt-2">
    <h2 class="text-center fw-bold">Administrateur</h2>
    <div class="container-fluid w-50 h-50 rounded-1 " style="border-left: 5px solid orangered; border-right:5px solid orangered">
        <div class="container w-100 d-flex justify-content-center ">

            <img src="/storage/{{Auth::user()->image}}" alt="" class="img-fluid rounded-2" style="width: 40%; height:30%;">
        </div>
        <h6>Nom d'utilisateur: &nbsp; &nbsp; <span class="fw-bold text-center fs-4">{{Auth::user()->name}}</span> </h6>
        <h6>Email:  &nbsp; &nbsp;<span class="fw-bold text-center fs-4">{{Auth::user()->email}}</span>  </h6>
        <h6>Telephone: &nbsp; &nbsp; <span class="fw-bold text-center fs-4">{{Auth::user()->telephone}}</span> </h6>
        <h6>Role: &nbsp; &nbsp; <span class="fw-bold text-center fs-4">{{Auth::user()->role}} </span> </h6>
    </div>
</div>
@endsection