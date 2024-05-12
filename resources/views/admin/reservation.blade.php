@extends('admin.base')
@section('title','Liste des reservation')
@section('content')
<h2 class="text-center">Liste des reservation</h2>
<form class="container form_container w-70 p-3 shadow-sm d-flex justify-content-center rounded-2 mt-2 " style="background-color: #fff;" action="" method="">
  <input id="search" type="text" name="search" class="form-control w-25" placeholder="rechercher une reservation vite..." > 
  <button id="search_btn" class="btn btn" style="overflow: hidden;"><img src="{{asset('icons/search-alt.svg')}}" style="width: 100%; height:100%; " alt=""></button>
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
        <th scope="col">Nom </th>
        <th scope="col">Prenom</th>
        <th scope="col">Email</th>
        <th scope="col">telephone</th>
        <th scope="col">prevu pour</th>
        <th scope="col">Nombre de personnes</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($reservations as $reservation )
        <tr>
            <td>{{$reservation->id}}</td>
            <td>{{$reservation->name}}</td>
            <td>{{$reservation->surname}}</td> 
            <td>{{$reservation->email}}</td> 
            <td>{{$reservation->phone}}</td> 
            <td>{{$reservation->date}}</td> 
            <td>{{$reservation->person_number}}</td> 
            <td class="d-flex justify-content-center gap-2">
              <form action="{{route('approved',$reservation)}}" method="post">
                @csrf
                @method('post')
                <input type="hidden" value="0" name="approved" >
                <input type="checkbox" class="form-check-input"  role="switch" name="approved"  value="1">
                <button class="btn btn-success">Approuver</button>
              </form>
                <form action="{{route('supprimerReservation',$reservation)}}" method="post">
                  @csrf
                  @method('delete')
                    <button class="btn btn-danger">Suprrimer</button>
                </form>
            </td>
          </tr>
        @empty
        <div class="alert alert-secondary text-center mt-2 mb-2" style="border-left:5px solid rgb(92, 92, 92); background-color:rgb(181, 181, 181);" role="alert">

           Pas de reservation disponibles
          </div>
        @endforelse
    </tbody>
    {{-- {{$reservations->links()}} --}}
  </table>
@endsection