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
    font-size:15px;
}
</style>
<div class="card" >
        <header class="card-header">
            <p class="card-header-title">Toutes le information sur le commissariat du : {{ $commissariats->nom}}</p>
        </header>
        <div class="card-content">
            

          <div class="form-group ">
              <label for="date" class="la">Localite :</label>
            {{ $commissariats->localite }}
          </div>
          <div class="form-group">
              <label for="heure" class="la">Matricule commissaire :</label>
             {{ $commissariats->matricule }}
          </div>
          <div class="form-group" >
              <label for="plcA" class="la">Nom du commissaire:</label>
            {{ $commissariats->nomCommissaire}}
          </div>
          
          <div class="form-group" >
              <label for="plcA" class="la">Prenom du commissaire:</label>
            {{ $commissariats->prenomCommissaire}}
          </div>
          <div class="form-group">
              <label for="plcB" class="la">email :</label>
             {{ $commissariats->email }}
          </div>
          <div class="form-group" >
              <label for="prixA"  class="la">Telephone :</label>
              {{ $commissariats->telephone }}
          </div>
@endsection