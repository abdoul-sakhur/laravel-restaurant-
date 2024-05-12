@extends('front.base')
@section('title', 'Menu')

@section('header')
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold fs-3" href="#">SAR<strong style="color: #F18E64;">BA</strong>-F<strong style="color:#F18E64;">OO</strong>D</a>
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
                        
                    <a href="{{route('connexion')}}" class="btn rounded-5" id="btn_loging">connexion</a>
                    <a href="{{route('inscription')}}" class="btn rounded-5" id="btn_loging">Inscription</a>
                    @endguest
                    @auth
                    <a href="{{route('voir_panier')}}" class="btn rounded-5" id="btn_loging"><img src="{{asset('icons/cart-8-83542.svg')}}" style="width:20px; height:20px;" alt=""> {{$content_cart}}</a>
                        <a href="" class="btn rounded-5" id="btn_loging">bienvenue , {{Auth::user()->name}}</a>
                    <form action="{{route('deconnexion',Auth::user())}}" class="form" method="POST">
                        @csrf
                        {{-- @method('post') --}}
                        <button href="" class="btn rounded-5" id="btn-logout">Deconnexion</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    {{-- suite header --}}
    <div class="container-fluid">
    <div id="carouselExampleControls" class="carousel  slide" data-bs-ride="carousel">
      <div class="carousel-inner rounded-4">
        <div class="carousel-item active">
          <img src="{{ asset('images/log-image2.jpg') }}" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('images/slide2.jpg') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('images/slide3.jpg') }}" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    </div>
@endsection


@section('content')
    <div class="container" style="width:90%;">

        <div class="row w-100 d-flex justify-content-center gap-4 mt-4 ">
            <h1 class="text-center fw-bold">Notre <strong>Menu</strong></h1>
            <div id="list_card" class="container-fluid w-100 d-flex justify-content-center gap-2">
                <a href="{{ route('menu') }}" class="btn p-2 rounded-5 shadow-sm bg">Tout &nbsp;<img
                        src="{{ asset('icons/001-chef-hat.png') }}" alt="" width="25px" height="25px"></a>
                @foreach ($categories as $category)
                    <a href="{{ route('menu/product/', ['id' => $category->id]) }}" class="btn p-2 rounded-5 shadow-sm bg"
                        id="{{ $category->id }}">{{ $category->name }} <img src="{{ $category->ImageUrl() }}"
                            alt="" width="35px" height="35px"></a>
                @endforeach
            </div>

            @foreach ($products as $product)
                <div class="card shadow-sm border-0 p-2" id="card" style="width: 14rem;">
                    <img src="{{ $product->imagePurl() }}" class="card-img-top rounded-2 " alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text fw-bold fs-2">{{ $product->price }} F</p>
                        <div class="pay-btn d-flex justify-content-between m-2" id="container-btn">
                            @for ($i = 0; $i < $product->quality; $i++)
                                <span><img src="{{ asset('images/stars.png') }}"
                                        style="width: 10px; height:10px;"></span>
                            @endfor
                            <a href="{{route('voir_plus.id',$product->id)}}" id="voir_plus_btn" class="btn btn rounded-3">voir plus</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
@section('footer')
<footer class="footer p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="fw-bold">SARBA-FOOD</h2>
            </div>
            <div class="col-md-3">
                <h5 class="fw-bold">A propos de nous</h5>
                <p>
                    Chez Sarba Food, nous sommes passionnés par la nourriture et l'expérience culinaire. Fondé avec
                    l'idée de créer un espace accueillant et chaleureux où chacun peut savourer des plats délicieux,
                    notre restaurant est devenu une destination de choix pour les amateurs de cuisine exquise.


                </p>
            </div>
            <div class="col-md-3">
                <h5 class="fw-bold">Conctatez-nous</h5>
                <ul class="list-unstyled">
                    <li>Email: sarba@gmail.com</li>
                    <li>Telephone: +1233567890</li>
                    <li>Adresse:Abijan, palmeraie</li>
                </ul>
                <div class="container map rounded-2  " style="width: 250px; height:150px; ">
                    <iframe style="width: 100%;height:100%; "
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2277.119071461105!2d-3.96154995087055!3d5.365692305002813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1eda8aa48afc9%3A0xa5cb0b4cbde07171!2sRond%20point%20de%20la%20palmeraie!5e0!3m2!1sfr!2sci!4v1713742260420!5m2!1sfr!2sci"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-md-3">
                <h5 class="fw-bold">Suivez-nous sur </h5>
                <ul class="list-inline footer-links">
                    <li class="list-inline-item">
                        <a href="#">
                            <img src="{{ asset('icons/whatsapp.png') }}" alt="">
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <img src="{{ asset('icons/instagram.png') }}" alt="">
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <img src="{{ asset('icons/snapchat.png') }}" alt="">
                        </a>
                    </li> <br>

                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p>© 2024 .Tous droits reserves.</p>
            </div>
            <div class="col-md-6 text-end">
                <ul class="list-inline footer-links">
                    <li class="list-inline-item">
                        <a href="#" class="text-dark">
                            regles d'usages
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="text-dark">
                            Conditions d'utilisation
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="text-dark">
                            map
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
@endsection
