<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription | Administration</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-4 p-4 h-50" style="border-radius: 10px 0px 0px 10px; background-color:#fff;">
            <h3 class="text-center fw-bold" >Inscription</h3>
            <form action="{{route('Register')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                @include('shared.input',['label'=>'Nom d\'utilisateur','name'=>'name'])
                @include('shared.input',['label'=>'Email','type'=>'email','name'=>'email'])
                @include('shared.input',['label'=>'Telephone','type'=>'number','name'=>'telephone'])
                @include('shared.input',['label'=>'Mot de passe','type'=>'password','name'=>'password'])
                @include('shared.fileInput',['label'=>'choisir une photo de profil','name'=>'image'])
                <input type="hidden"  name="role" value="admin">
                <button class="btn btn-info w-100 mt-2">S'inscrire</button>
            </form>
            <h6 class="text-center mt-2">Vous avez deja un compte ?<a href="{{route('showLogin')}}"> cliquez-ici</a></h6>
        </div>
        <div class="col-4  h-50" style="border-radius: 0px 10px 10px 0px; overflow:hidden;">
            <img src="{{asset('images/log-image.jpg')}}" alt="" style="width:100%; height:31rem; border-radius: 0px 10px 10px 0px;" >
        </div>
    </div>
</body>
</html>