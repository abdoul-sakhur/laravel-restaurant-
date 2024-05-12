@extends('admin.base')
@section('title','Liste des categories')
@section('content')
<h2 class="text-center">Liste des categories</h2>
<form class="container form_container w-70 p-3 shadow-sm d-flex justify-content-center rounded-2 mt-2 " style="background-color: #fff;" action="" method="">
  <input id="search" type="text" name="search" class="form-control w-25" placeholder="rechercher une categorie vite..." > 
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
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category )
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td width="80px" height="80px"><img width="80px" height="80px" src="{{$category->ImageUrl()}}" alt=""></td> 
            <td class="d-flex justify-content-center m-2 gap-2">
                <a href="{{route('admin.category.edit',$category)}}" class="btn btn-info"> Editer</a>
                <form action="{{route('admin.category.destroy',$category)}}" method="post">
                  @csrf
                  @method('delete')
                    <button class="btn btn-danger">Suprrimer</button>
                </form>
            </td>
          </tr>
        @empty
        <div class="alert alert-secondary text-center mt-2 mb-2" style="border-left:5px solid rgb(92, 92, 92); background-color:rgb(181, 181, 181);" role="alert">    
                 Pas de categories disponibles
          </div>
        @endforelse
    </tbody>
    {{$categories->links()}}
  </table>
@endsection