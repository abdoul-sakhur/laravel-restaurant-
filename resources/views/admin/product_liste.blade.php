@extends('admin.base')
@section('title','Liste des plats')
@section('content')
<h2 class="text-center fw-bold mb-2">Liste des plats</h2>
<form class="container form_container w-70 p-3 shadow-sm d-flex justify-content-center rounded-2 mt-2 " style="background-color: #fff;" action="" method="">
  <input id="search" type="text" name="search" class="form-control w-25" placeholder="rechercher un plat vite..." > 
  <button id="search_btn" class="btn btn"><img src="{{asset('icons/search-alt.svg')}}" style="width: 100%; height:100%; " alt=""></button>
</form>
<table class="table">
  @if (session('success'))          
  <div class="alert alert text-center mt-1 mb-2 w-100" role="alert" style="border-left: 5px solid rgb(41, 230, 41); background-color:rgb(198, 255, 198); ">
      {{session('success')}}
     </div>
  @endif
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Prix</th>
        <th scope="col">Image P.</th>
        <th scope="col">en stock ?</th>
        <th scope="col">Qualite</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($products as $product )
        <tr class="">
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td class="fw-bold">{{$product->price}} F</td>
            <td width="80px" height="80px"><img width="80px" height="80px" src="{{$product->imagePurl()}}" alt=""></td>
            <td>@if ($product->stock !== 0)
                <h4 class="text-center text-success ">Disponible</h4>
                @else
              <h4 class="text-danger" >Pas disponible</h4>
            @endif
            </td>
            <td>{{$product->quality}}</td>
            <td class="d-flex justify-content-center m-2 gap-2 mt-3">
                <a href="{{route('admin.product.edit',$product)}}" class="btn btn-info"> Editer</a>
                <form action="{{route('admin.product.destroy',$product)}}" method="post">
                  @csrf
                  @method('delete')
                    <button class="btn btn-danger">Suprrimer</button>
                </form>
            </td>
          </tr>
        @empty
        <div class="alert alert-secondary text-center mt-2 mb-2" style="border-left:5px solid rgb(92, 92, 92); background-color:rgb(181, 181, 181);" role="alert">
           Pas de plats disponibles
          </div>
        @endforelse
    </tbody>
  
  </table>
  <div class=" container my-4">
    {{$products-> links() }}
  </div>
 
@endsection