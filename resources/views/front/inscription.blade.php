<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription | SARBA-FOOD</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqdcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            html,body{
                background-color: #fef2eb;
            }
            ::-webkit-scrollbar{
  width: 8px;
}
::-webkit-scrollbar-track{
  background-color: #fff;
}
::-webkit-scrollbar-thumb{
  background-color: #fef2eb;
  border-radius: 5px;
}
h3{
    color:#F18E64 ;
}
.button{
    background-color: #F18E64;
    color: #fef2eb;
    font-weight: bold;
}
.button:hover{
    background-color: #fef2eb;
    color: #F18E64;
}
input:focus{
    border: 2px solid #F18E64 !important;
}
        </style>
</head>
<body >
    
    <div class="row d-flex justify-content-center mt-5 w-100">
        <div class="col-md-4 col-sm-12 p-4 h-50" style="border-radius: 10px 0px 0px 10px; background-color:#fff;">
            <h3 class="text-center fw-bold" >Inscription</h3>
            <form action="{{route('inscrire')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                @include('shared.input',['label'=>'Nom d\'utilisateur','name'=>'name'])
                @include('shared.input',['label'=>'Email','type'=>'email','name'=>'email'])
                @include('shared.input',['label'=>'Telephone','type'=>'number','name'=>'telephone'])
                @include('shared.input',['label'=>'Mot de passe','type'=>'password','name'=>'password'])
               
                <input type="hidden"  name="role" value="user">
                <button class="btn button w-100 mt-2">S'inscrire</button>
            </form>
            <h6 class="text-center mt-2">Vous avez deja un compte ?<a href="{{route('connexion')}}"> cliquez-ici</a></h6>
        </div>
        <div class="col-md-4 col-sm-12  " style="border-radius: 0px 10px 10px 0px; overflow:hidden;">
            <img src="{{asset('images/log-image.jpg')}}" alt="" style="width:100%; height:26.3rem; border-radius: 0px 10px 10px 0px;" >
        </div>
    </div>

</body>
</html>
