@extends('front.base')
@section('title', 'Accueil')
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

                        <a href="{{ route('connexion') }}" class="btn rounded-5" id="btn_loging">connexion</a>
                        <a href="{{ route('inscription') }}" class="btn rounded-5" id="btn_loging">Inscription</a>
                    @endguest
                    @auth
                        <a href="{{ route('voir_panier') }}" class="btn rounded-5" id="btn_loging"><img
                                src="{{ asset('icons/cart-8-83542.svg') }}" style="width:20px; height:20px;" alt="">
                            {{ $content_cart }}</a>
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
    {{-- suite header --}}
    <div class="row w-100 flex-sm-wrap gap-5 ">
        <div class="col-md-6 col-sm-12 mt-5 d-flex justify-content-center align-content-center flex-column">
            <h1 class="text-center fw-bold" style="font-size:55px;">Bienvenue Chez Sarba food</h1>
            <h2 class="fw-bold text-center">La qualite dans le plat , une priorite.</h2>
            <a href="{{ route('menu') }}" id="btn_visite" class="btn w-50 mt-2 rounded-5" style="margin-left: 20%;">Visitez
                notre
                restaurant</a>
        </div>
        <div class="col-md-6 col-sm-12 " style="max-width:500px; max-height:500px;">
            <img src="{{ asset('images/landing1.png') }}" alt="" width="100%" height="100%">
        </div>
    </div>
@endsection
@section('content')
    <span class="fw-bold fs-3 " style="margin-left: 30px;">Plats <strong>populaires</strong> </span>
    <div class="row w-100 d-flex justify-content-center gap-4" id="card">
        @foreach ($populare_products as $popular)
            <div class="card shadow-sm border-0" style="width: 14rem;">
                <img src="{{ $popular->imagePurl() }}" class="card-img-top rounded-2 " alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $popular->name }}</h5>
                    <p class="card-text fw-bold fs-2">{{ $popular->price }}F</p>
                    <div class="pay-btn d-flex justify-content-between" id="container-btn">
                        @for ($i = 0; $i < $popular->quality; $i++)
                            <span><img src="{{ asset('images/stars.png') }}" style="width: 10px; height:10px;"></span>
                        @endfor
                        <a href="{{ route('voir_plus.id', $popular->id) }}" id="voir_plus_btn"
                            class="btn btn rounded-3">voir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row w-100">
        <h1 class="text-center mt-3">Besoins d'un <strong> petit dejeuner</strong> vite fait ?</h1>
        <div style="background: url('images/wave-haikei.svg');" class="col-md-6 col-ms-12 shadow-sm container_section2 p-5">
            <h1 class="text-center fw-bold">Nos plats sont confectionnees avec amour.</h1>
            <h3>Chez Sarba Food, chaque plat que nous préparons est le résultat d'une véritable passion pour la cuisine.
                Nous croyons en l'importance de créer des plats délicieux et nourrissants qui réchauffent le cœur et
                nourrissent l'âme.

            </h3>
            <a href="{{ route('menu/product/', ['id' => '6']) }}" id="btn_visite" class="btn w-50 mt-2 rounded-5" style="margin-left: 20%;">Voir plus a ce
                sujet</a>

        </div>
        <div class="col-md-6 col-sm-12" style="max-width:650px; max-height:600px;"> <img
                src="{{ asset('images/breakfast.png') }}" alt="" width="100%" height="100%">
        </div>
    </div>
    <div class="row w-100 d-flex justify-content-center gap-4 mt-4">
        <h1 class="text-center fw-bold">Commandez <strong> nos plats de resistances.</strong></h1>
        @foreach ($resistant_product as $resistant)
            <div class="card shadow-sm border-0" style="width: 14rem;" id="card">
                <img src="{{ $resistant->imagePurl() }}" class="card-img-top rounded-2 " alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $resistant->name }}</h5>
                    <p class="card-text fw-bold fs-2">{{ $resistant->price }} F</p>
                    <div class="pay-btn d-flex justify-content-between" id="container-btn">
                        @for ($i = 0; $i < $resistant->quality; $i++)
                            <span><img src="{{ asset('images/stars.png') }}" style="width: 10px; height:10px;"></span>
                        @endfor
                        <a href="{{ route('voir_plus.id', $resistant->id) }}" id="voir_plus_btn"
                            class="btn btn rounded-3">voir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row w-100">
        <h1 class="text-center mt-3">Savoir-faire des <strong style="color: green;">Legumes</strong> notre specialite !
        </h1>
        <div class="col-md-6 col-sm-6" style="max-width:650px; max-height:600px;"> <img
                src="{{ asset('images/vegeto.png') }}" alt="" width="100%" height="100%"></div>
        <div style="background: url('images/wave-haikei.svg');"
            class="col-md-6 col-sm-6 shadow-sm container_section2 p-5">
            <h1 class="text-center fw-bold">Sarba food, nos amis vegetariens sont servis.</h1>
            <h3>Sarba Food est l'endroit parfait pour les amoureux de la bonne cuisine, où nos amis végétariens sont
                toujours les bienvenus. </h3>
            <a href="{{ route('menu/product/', ['id' => '3']) }}" id="btn_visite" class="btn w-50 mt-2 rounded-5"
                style="margin-left: 20%;">Voir plus </a>

        </div>
    </div>
    <div class="row w-100 d-flex justify-content-center gap-4 mt-4">
        <h1 class="text-center fw-bold">Envie d'un <strong> desserts</strong> ou de plats pour <strong>grignoter ?</strong>
        </h1>
        @foreach ($cereals as $cereal)
        <div class="card shadow-sm border-0" style="width: 14rem;">
            <img src="{{ $cereal->imagePurl() }}" class="card-img-top rounded-2 " alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $cereal->name }}</h5>
                <p class="card-text fw-bold fs-2">{{ $cereal->price }}F</p>
                <div class="pay-btn d-flex justify-content-between" id="container-btn">
                    @for ($i = 0; $i < $cereal->quality; $i++)
                        <span><img src="{{ asset('images/stars.png') }}" style="width: 10px; height:10px;"></span>
                    @endfor
                    <a href="{{ route('voir_plus.id', $cereal->id) }}" id="voir_plus_btn"
                        class="btn btn rounded-3">voir plus</a>
                </div>
            </div>
        </div>
    @endforeach
        
    </div>
    <div class="row w-100">
        <h1 class="text-center mt-3"><strong>une pause fraicheur</strong>, vous etes au bon endroit. </h1>
        <div style="background: url('images/wave-haikei.svg');"
            class="col-md-6 col-sm-12 shadow-sm container_section2 p-5">
            <h1 class="text-center fw-bold">Avec cette chaleur , autant <strong>s'hydrater du mieux que l'on on
                    peut.</strong> </h1>
            <h3> profitez de boissons fraîches et
                rafraîchissantes. Optez pour des boissons hydratantes comme l'eau de coco, les smoothies aux fruits frais ou
                les infusions de fruits glacées. </h3>
            <a href="{{ route('menu/product/', ['id' => '2']) }}" id="btn_visite" class="btn w-50 mt-2 rounded-5"
                style="margin-left: 20%;">Voir plus </a>
        </div>
        <div class="col-md-6 col-sm-12" style="max-width:500px; max-height:500px;"> <img
                src="{{ asset('images/jus.png') }}" alt="" width="100%" height="100%"></div>
    </div>
    <div class="row w-100 d-flex justify-content-center">

        <script>
            @if (session('success'))
                Swal.fire({
                    title: "reservation",
                    text: "Votre reservation a ete prise en compte!",
                    icon: "success"
                });
            @endif
        </script>

        <h1 class="text-center fw-bold">Reservez <strong>une table ici.</strong> </h1>
        <div class="col-md-6 col-sm-12 shadow-sm container-section2 p-5"
            style="background: url('images/wave-haikei.svg');">
            <form action="{{ route('reservation') }}" class="form" method="POST">
                @csrf
                @method('post')

                @include('shared.input', ['name' => 'name', 'label' => 'Nom'])
                @include('shared.input', ['name' => 'surname', 'label' => 'Prenom'])
                @include('shared.input', [
                    'name' => 'email',
                    'label' => 'email',
                    'type' => 'email',
                ])
                @include('shared.input', [
                    'name' => 'phone',
                    'label' => 'Telephone (whatsapp de preference)',
                    'type' => 'number',
                ])
                @include('shared.input', ['name' => 'date', 'label' => 'Date de venu', 'type' => 'date'])
                @include('shared.input', [
                    'name' => 'person_number',
                    'label' => 'Nombre de personnes',
                    'type' => 'number',
                ])
                <button class="btn mt-4 " id="reserverbtn" style="margin-left:30%;">Reservez maintenant</button>
            </form>

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
