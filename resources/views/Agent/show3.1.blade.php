@extends('layouts.commi')
@section('content')

<style>
  
  .card {
    width:90%;
    margin: auto;
   
    
   
  }
  .card-header {
    width:100%;
    margin: auto;
   
    text-align: center;
    font-weight:bold;
    font-size:20px;
    background-color:#FFA07A;
  }
.la{
    margin-left: 50px;
    text-align: center;
    font-weight:bold;
    font-size:25px;
}
</style>
<div class="card" >
        <header class="card-header">
            <p class="card-header-title">Toutes le information sur l'agent de Mattricule : {{ $agents->matricule }}</p>
        </header>
        <div class="card-content">
            

          <div class="form-group ">
              <label for="date" class="la">Nom :</label>
            {{ $agents->nom }}
          </div>
          <div class="form-group">
              <label for="heure" class="la">Prenom :</label>
             {{ $agents->prenom }}
          </div>
          <div class="form-group" >
              <label for="plcA" class="la">Adresse:</label>
            {{ $agents->adresse }}
          </div>
          <div class="form-group">
              <label for="plcB" class="la">email :</label>
             {{ $agents->email }}
          </div>
          <div class="form-group" >
              <label for="prixA"  class="la">Telephone :</label>
              {{ $agents->telephone }}
          </div>
@endsection