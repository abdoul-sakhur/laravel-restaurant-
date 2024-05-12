<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Administration</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqdcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container-fluid h-100">

        <div class="row h-100" id="side">
            <div class="col-2">
                <div class="logo mt-2 shadow-sm">
                    <h4 class="fw-bold">SARBA F00D.</h4>
                </div>
                <!--  sidebar-->
                <ul class="ul mt-5">
                    <li class="shadow-sm text-center"><a href="{{ route('index') }}"><img
                                src="{{ asset('icons/001-chef-hat.png') }}" width="30px" height="30px" alt=""
                                srcset=""> | Dashboard</a></li>
                    <li class="shadow-sm text-center"><a href="{{ route('admin.product.index') }}"><img
                                src="{{ asset('icons/038-water.png') }}" width="30px" height="30px" alt=""
                                srcset=""> | Plats</a></li>
                    <li class="shadow-sm text-center"><a href="{{ route('admin.product.create') }}"><i
                                class="fa-solid fa-angle-down"></i>Ajouter un plat</a></li>
                    <li class="shadow-sm text-center"><a href="{{ route('admin.category.index') }}"><img
                                src="{{ asset('icons/010-wish list.png') }}" width="30px" height="30px"
                                alt="" srcset=""> | Categories </a></li>
                    <li class="shadow-sm text-center"><a href="{{ route('admin.category.create') }}"><i
                                class="fa-solid fa-angle-down"></i>Ajouter une categorie </a></li>

                    <li class="shadow-sm text-center"><a href="{{ route('user_list') }}"><img
                                src="{{ asset('icons/users.svg') }}" width="30px" height="30px" alt=""
                                srcset=""> | Clients </a></li>
                    <li class="shadow-sm text-center"><a href="{{ route('admin.slider.index') }}"><img
                                src="{{ asset('icons/slideshow-3-line.svg') }}" width="30px" height="30px"
                                alt="" srcset="">| Slider </a></li>
                    <li class="shadow-sm text-center"><a href="{{ route('admin.slider.create') }}"><i
                                class="fa-solid fa-angle-down"></i> Ajouter slider </a></li>
                    <li class="shadow-sm text-center"><a href="{{ route('voir_reservation') }}"><i
                                class="fa-solid fa-angle-down"></i> Reservations </a></li>
                    <li class="shadow-sm text-center"><a href="{{ route('admin.commande') }}"><i
                                class="fa-solid fa-angle-down"></i> Commandes </a></li>
                </ul>

            </div>
            <div class="col-10" style="padding: 0;">
                <form class="container form_container w-100 p-3 shadow-sm d-flex justify-content-center rounded-2 mt-2 "
                    style="background-color: #fff;" action="" method="">
                    <div id="set_container" class="d-flex justify-content-arround">
                        {{-- <div class="settings" style="overflow: hidden;"><img src="/storage/{{ Auth::user()->image }}" --}}
                                {{-- style="width: 100%; height:100%;" alt="" srcset=""></div> --}}
                        <ul class="d-flex gap-3 justify-content-center align-content-center mt-3 fw-bold">
                            <li>
                                <style>
                                    li {
                                        list-style-type: none;

                                    }

                                    li a {
                                        text-decoration: none;
                                    }
                                </style>
                                <a href="{{ route('showParametre') }}" class="btn btn shadow-sm"
                                    style="  background-color: #98d1f9;"> Parametres</a>
                            </li>
                            <li>
                                @auth

                                    <form action="{{ route('logout', Auth::user()) }}" method="post">
                                        @method('post')
                                        @csrf
                                        <button class="btn btn shadow-sm"
                                            style="background-color: salmon">Déconnexion</button>
                                    </form>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </form>
                <!-- le contenu-->
                <div class="container w-100  main h-100 mt-2 shadow-sm rounded-2  ">
                    @yield('content')
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"
        integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
