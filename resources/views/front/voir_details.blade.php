@extends('front.base')
@section('title', 'Accueil')
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
                    <a href="{{route('voir_panier')}}" class="btn rounded-5" id="btn_loging"><img src="{{asset('icons/cart-8-83542.svg')}}" style="width:20px; height:20px;" alt=""> {{$content_cart}}</a>
                        <a href="" class="btn rounded-5" id="btn_loging">bienvenue , {{ Auth::user()->name }}</a>
                        <form action="{{ route('deconnexion', Auth::user()) }}" class="form" method="POST">
                            @csrf
                            {{-- @method('delete') --}}
                            <button href="" class="btn rounded-5" id="btn-logout">Deconnexion</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <div class="row w-100 d-flex justify-content-center   " >
        <div class="col-md-5 col-sm-12 rounded-2 p-2 bg-light  shadow-sm m-2 overflow-hidden" class="container_details_img">
             <img src="{{$product->imagePurl() }}" alt="" class="details_img">
             <div class="container d-flex justify-content-center ">
                <img src="{{$product->imagePurl() }}" alt="" class="shadow-sm  mini_img">
                <img src="{{$product->imageSurl() }}" alt="" class="shadow-sm  mini_img">
                <img src="{{$product->imageTurl() }}" alt="" class="shadow-sm  mini_img">
             </div>
            </div>
        <div class=" col-md-5 col-sm-12 p-2 overflow-hidden bg-light shadow-sm rounded-2">
            <h6 class="text-secondary" >--categorie du plat: {{$product->categories()->first()->name}} </h6>
            <h1 class="text-center fw-bold">{{$product->name}}</h1>
            <h2>Description du plat</h2>
            <p>{{$product->description}}</p>
                <h2 class="text-center fw-bold">{{$product->price}} F</h2>
                <a href="{{route('AjouterPanier',$product->id)}}" class="btn   ajouter_panier" style="margin-left:30%;">Ajouter au panier </a>

        </div>

    </div>

@endsection
