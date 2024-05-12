@extends('admin.base')
@section('title','Liste des commandes')
@section('content')
<h2 class="text-center">Liste des commandes</h2>

<table class="table">
  @if (session('success'))          
  <div class="alert alert text-center mt-1 mb-2 w-100" role="alert" style="border-left: 5px solid rgb(41, 230, 41); background-color:rgb(198, 255, 198); ">
      {{session('success')}}
     </div>
  @endif
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom du client</th>
        <th scope="col">Telephone</th>
        <th scope="col">Adresse</th>
        <th scope="col">Plats</th>
        <th scope="col">prix total</th>
        <th scope="col">Vendu ?</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($commandes as $commande )
        <tr>
            <td>{{$commande->id}}</td>
            <td>{{$commande->nom_client}}</td>
            <td >{{$commande->telephone_client}}</td> 
            <td >{{$commande->adresse}}</td> 
            <td >{{$commande->plats}}</td> 
            <td >{{$commande->prix_total}}</td>
            <td>
                 <form action="{{route('ModifierCommande',$commande->id)}}" method="post" class="d-flex">
                    @csrf
                    @method('post')
               <input type="checkbox" name="vendu" id="" value="1">
                <button type="submit" class="btn btn-success">appliquer</button>
            </form>
        </td> 
            <td class="d-flex justify-content-center m-2 gap-2">
               
                <form action="#" method="post">
                  @csrf
                  @method('delete')
                    <button class="btn btn-danger">Suprrimer</button>
                </form>
            </td>
          </tr>
        @empty
        <div class="alert alert-secondary text-center mt-2 mb-2" style="border-left:5px solid rgb(92, 92, 92); background-color:rgb(181, 181, 181);" role="alert">    
                 Pas de commandes disponibles
          </div>
        @endforelse
    </tbody>
    {{$commandes->links()}}
  </table>
@endsection