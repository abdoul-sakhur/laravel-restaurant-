@extends('admin.base')
@section('title', 'liste des utilisateurs')
@section('content')
@section('content')
    <h2 class="text-center fw-bold mb-2">Liste des plats</h2>
    <form class="container form_container w-70 p-3 shadow-sm d-flex justify-content-center rounded-2 mt-2 "
        style="background-color: #fff;" action="" method="">
        <input id="search" type="text" name="search" class="form-control w-25" placeholder="rechercher un plat vite...">
        <button id="search_btn" class="btn btn"><img src="{{ asset('icons/search-alt.svg') }}"
                style="width: 100%; height:100%; " alt=""></button>
    </form>
    <table class="table">
        @if (session('success'))
            <div class="alert alert text-center mt-1 mb-2 fw-bold w-100" role="alert"
                style="border-left: 5px solid rgb(230, 85, 41); background-color:rgb(255, 195, 195); ">
                {{ session('success') }}
            </div>
        @endif
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Telephone</th>
                <th scope="col">Image P.</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($all_users as $user)
                <tr class="">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->telephone }} </td>
                    <td width="80px" height="80px"><img width="80px" height="80px"
                            src="/storage/{{ Auth::user()->image }}" alt=""></td>
                    <td>
                        @if ($user->role == 'admin')
                            <h4 class="text-center text-white bg-success rounded-3 ">{{ $user->role }}</h4>
                        @else
                            <h4 class="text-center text-white bg-secondary rounded-3 ">{{ $user->role }}</h4>
                        @endif

                    </td>

                    <td class="d-flex justify-content-center m-2 gap-2 mt-3">
                <form action="{{route('user.delete',$user)}}" method="post">
                  @csrf
                  @method('delete')
                    <button class="btn btn-danger">Suprrimer</button>
                </form>
            </td>
                </tr>
            @empty
                <div class="alert alert-secondary text-center mt-2 mb-2"
                    style="border-left:5px solid rgb(92, 92, 92); background-color:rgb(181, 181, 181);" role="alert">
                    Pas d'utilisateurs disponibles
                </div>
            @endforelse
        </tbody>

    </table>
    <div class=" container my-4">
      
    </div>
@endsection
