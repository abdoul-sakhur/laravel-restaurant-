@extends('front.base')
@section('title','commande')
@section('header')
<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-3" href="#">SARBA FOOD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left:20%; ">
                <li class="nav-item">
                    <a class="nav-link  " id="links" aria-current="page" href="{{ route('accueil') }}">Accueil</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link "id="links" href="{{ route('menu') }}">
                        Menu
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="links" href="{{ route('VoirContact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="links" href="{{ route('VoirApropos') }}">A propos de nous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="links" href=""><i class="fa-solid fa-user"></i></a>
                </li>
            </ul>
            <div class="container-btns d-flex gap-3">
                @guest

                    <a href="{{ route('connexion') }}" class="btn rounded-5" id="btn_loging">connexion</a>
                    <a href="{{ route('inscription') }}" class="btn rounded-5" id="btn_loging">Inscription</a>
                @endguest
                @auth
                    <a href="" class="btn rounded-5" id="btn_loging">bienvenue , {{ Auth::user()->name }}</a>
                    <form action="{{ route('deconnexion', Auth::user()) }}" class="form" method="POST">
                        @csrf
                        @method('delete')
                        <button href="" class="btn rounded-5" id="btn-logout">Deconnexion</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
@endsection

@section('content')

<div class="row w-100 col-md-8 col-sm-12 d-flex align-items-center justify-content-center  ">
    <form action="{{route('Commander')}}" class="col-md-8 col-sm-12 bg-white p-3 rounded-3 shadow-sm" method="post">
        <h1 class="text-center">Finalisez la <strong>commande</strong> </h1>
        @csrf
        @method('post')
        @include('shared.input',['label'=>'Nom du client','name'=>'nom_client','value'=>Auth::user()->name])
        @include('shared.input',['label'=>'Contact du client','name'=>'telephone_client','type'=>'number','value'=>Auth::user()->telephone])
        @include('shared.input',['label'=>'Adresse du client','name'=>'adresse','value'=>''])
      <div class="form-group">

          <label for="">plats</label>
          <input type="text " class="form-control w-100 shadow-sm " name="plats" value="
          @foreach ($panier as $pan )
              {{$pan->name}}
          @endforeach
                "
           >
      </div>
      <div class="form-group">
            <label for="">prix total</label>
          <input type="number " class="form-control w-100 shadow-sm " name="prix_total" value="{{$total}} F" >
      </div>
        
        <button  class="btn mt-2   btn-success" >Commander</button>
    </form>
</div>
@endsection