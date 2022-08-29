@extends('layouts/commissariat')
@extends('layouts/djik')
@section('content')


@endsection
<form  style="width:50%;margin:auto;" method="post" action="{{ route('agents.update', $agents->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
           
              <div class="card">
        <header class="card-header">
            <p class="card-header-title">Mattricule : {{ $agents->matricule }}</p>
        </header>
        <div class="card-content">
            <div class="content">
            <label for="code">Matricile:</label>
              {{ $agents->matricule }}
          </div>

          <div class="form-group">
              <label for="date">Nom :</label>
             {{ $agents->nom }}
          </div>
          <div class="form-group">
              <label for="heure">Prenom :</label>
             {{ $agents->prenom }}
          </div>
          <div class="form-group">
              <label for="plcA">Adresse:</label>
            {{ $agents->adresse }}
          </div>
          <div class="form-group">
              <label for="plcB">email :</label>
             {{ $agents->email }}
          </div>
          <div class="form-group">
              <label for="prixA">Telephone :</label>
              {{ $agents->telephone }}
          </div>
            </div>
        </div>
    </div>
          
      </form>

     