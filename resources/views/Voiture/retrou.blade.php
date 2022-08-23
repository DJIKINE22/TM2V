<!-- index.blade.php -->

@extends('layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
  .card-header {
    width:50%;
    margin: auto;
    margin-top: 120px;
    text-align: center;
    font-weight:bold;
    font-size:20px;
    background-color:#FFA07A;
  }
</style>


<div class="uper">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <img src="../img/logo.png" alt="" width=200px; ></a>
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">ACCUEIL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('vols') }}">VOLS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">RESERVATIONS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">CONTACT</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">COMPAGNIES</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown01">
            <li><a class="dropdown-item" href="#">SKY MALI</a></li>
            <li><a class="dropdown-item" href="#">AIR BURKUNA</a></li>
            <li><a class="dropdown-item" href="#">AIR FRANCE</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Recherche</button>
      </form>
    </div>
  </div>
</nav>
<div class="card-header">
  La liste de Vols
  </div>
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    
    
        <table class="table  table-bordered table-responsive ">
          
        
            <thead>
                <tr>
                <th scope="col">Identifiant</th>
                <th scope="col">Code</th>
                <th scope="col">Date de depart</th>
                <th scope="col">Heure de depart</th>
                <th scope="col">Nombre de place de classe A</th>
                <th scope="col">Nombre de place de classe B</th>
                <th scope="col">Prix de la classe A</th>
                <th scope="col">Prix de la classe B</th>
                <th scope="col" colspan="3">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($vols as $vol)
                <tr>
                    <th scope="row">{{$vol->id}}</th>
                    <td>{{$vol->code}}</td>
                    <td>{{$vol->date_depart}}</td>
                    <td>{{$vol->heure_depart}}</td>
                    <td>{{$vol->nbre_plc_classA}}</td>
                    <td>{{$vol->nbre_plc_classB}}</td>
                    <td>{{$vol->prixA}}</td>
                    <td>{{$vol->prixB}}</td>
                    <td><a href="{{ route('vols.show', $vol->id)}}" class="btn btn-primary">Details</a></td>
                    <td><a href="{{ route('vols.edit', $vol->id)}}" class="btn btn-primary">Modifier</a></td>
                    <td>
                        <form action="{{ route('vols.destroy', $vol->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
           
        </table>
       
    </div>
    {!!$vols->links()!!}
 </div>
</div>
    @endsection