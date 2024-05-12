<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connextion | Administration</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-4 p-5  h-50" style="border-radius: 10px 0px 0px 10px; background-color:#fff;">
            @if (session('success'))
                
            <div class="alert alert text-center" role="alert" style="border-left: 5px solid rgb(41, 230, 41); background-color:rgb(198, 255, 198); ">
                {{session('success')}}
               </div>
            @endif
            <h3 class="text-center fw-bold" >Connexion</h3>
            <form action="{{route('Login')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                @include('shared.input',['label'=>'Nom d\'utilisateur','name'=>'name'])
                
                @include('shared.input',['label'=>'Mot de passe','type'=>'password','name'=>'password'])
               
                <button class="btn btn-info w-100 mt-2">Se connecter</button>
            </form>
            <h6 class="text-center mt-2">Vous n'avez pas de compte ?<a href="{{route('showRegister')}}"> cliquez-ici</a></h6>
        </div>
        <div class="col-4  h-50" style="border-radius: 0px 10px 10px 0px; overflow:hidden;">
            <img src="{{asset('images/log-image2.jpg')}}" alt="" style="width:100%; height:21.5rem; border-radius: 0px 10px 10px 0px;" >
        </div>
    </div>
</body>
</html>