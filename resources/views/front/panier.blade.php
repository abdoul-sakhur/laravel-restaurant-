@extends('front.base')
@section('title', 'Panier')
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
                            @method('post')
                            <button href="" class="btn rounded-5" id="btn-logout">Deconnexion</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
@endsection
@section('content')
    <h1 class="text-center fw-bold">PAN<strong style="text-decoration: underline;">IER</strong></h1>
    <div class="row w-100 d-flex justify-content-center">
        <div class="col-md-8 col-sm-12 ">
            @forelse ($panier as $pan)
                <div class="col-12 d-flex justify-content-between rounded-2 shadow-sm bg-light p-3 panier">

                    <div class="rounded-2 shadow-sm element1 overflow-hidden"><img src="{{$pan->options->get('image') }}" alt=""></div>
                    <div class="element" style="width:250px;">
                        <h2 style="font-size:20px;">{{ $pan->name }}</h2>

                        <h5>{{number_format($pan->price, thousands_separator:' ')  }} F</h5>
                    </div>
                    <div class="element d-flex justify-content-between" style="width:200px;">
                        <div class="moins" style="margin-right: 10px;"><a href="{{route('diminuerQuantite',$pan->rowId)}}">-</a></div>
                        <div class="quantite rounded-2   shadow-sm text-center"><span>{{ $pan->qty }}</span></div>
                        <div class="plus" style="margin-left:10px;"><a href="{{route('augmenterQuantite',$pan->rowId)}}">+</a></div>
                        <span style="margin-left: 20px;">{{ number_format($pan->qty * $pan->price , thousands_separator:' ')}} F</span>
                    </div>
                    <div class="element " style="width: 20px;height:20px;">
                        <a href="{{route('supprimerItem',$pan->rowId)}}"><img src="{{ asset('icons/trash-alt.svg') }}" alt=""></a>
                    </div>
                </div>
            @empty
            <div class="col-md-8 col-sm-12 d-flex justify-content-center rounded-2 shadow-sm bg-light p-3 panier">
                <h2 class="text-center">panier vide</h2>
            </div>
            @endforelse
        </div>
        <div class="col-md-4 col-sm-12 d-flex flex-column">
            <div class="total_div bg-light shadow-sm rounded-2 p-3">
                <div class="text_tot d-flex justify-content-between">
                    <span>produits</span>
                    <span class="fw-bold">{{number_format($total,thousands_separator:' ')}} F</span>
                </div>
                <div class="text_tot d-flex justify-content-between">
                    <span>Livraison</span>
                    <span class="fw-bold">{{number_format(0,thousands_separator:' ')}}F</span>
                </div>
                <hr>
                <div class="Total d-flex justify-content-between">
                    <h2 class="fw-bold">total</h2>
                    <h2 class="fw-bold">{{number_format($total,thousands_separator:' ')}} F</h2>
                </div>
                <a href="{{route('voirCommande',Auth::user()->id)}}" class="btn btn-success valider_btn">Passer a la commande</a>
            </div>
            <div class="info_div d-flex justify-content-center shadow-sm rounded-2 bg-light p-2 mt-2 fw-bold">
                Goûtez l'authenticité ivoirienne avec Sarba Food - Un festin de saveurs à portée de clic!
            </div>
            <div class="market_div info_div d-flex flex-column shadow-sm rounded-2 bg-light p-2 mt-2">
                <div class="market d-flex ">

                    <img src="{{ asset('icons/001-delivery car.svg') }}" style="width: 40px; height:40px;"
                        alt="">&nbsp; &nbsp;<p>Vos colis sont livrés rapidement, à l'heure et en toute fiabilité. </p>
                </div>
                <hr>
                <div class="market d-flex ">

                    <img src="{{ asset('icons/cash-fill.svg') }}" style="width: 40px; height:40px;" alt="">&nbsp;
                    &nbsp;<p> Effectuez vos transactions en toute tranquillité d'esprit.</p>
                </div>
                <hr>
                <div class="market d-flex ">

                    <img src="{{ asset('icons/secure-payment-fill.svg') }}" style="width: 40px; height:40px;"
                        alt="">&nbsp; &nbsp;<p>Nous garantissons la confidentialité de vos informations personnelles et financières.</p>
                </div>

            </div>
        </div>
    </div>
@endsection
