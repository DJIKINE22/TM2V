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
            <p class="card-header-title">Toutes le information sur la voiture d'immatriculation : {{ $voitures->immatri}}</p>
        </header>
        <div class="card-content">
            

          <div class="form-group ">
              <label for="date" class="la">Marque :</label>
            {{ $voitures->marque }}
          </div>
          <div class="form-group">
              <label for="heure" class="la">Modele:</label>
             {{ $voitures->modele }}
          </div>
          <div class="form-group" >
              <label for="plcA" class="la">Couleur:</label>
            {{ $voitures->couleur}}
          </div>
          
          <div class="form-group" >
              <label for="plcA" class="la">Carburant:</label>
            {{ $voitures->carburant}}
          </div>
          <div class="form-group">
              <label for="plcB" class="la">Photo :</label>
             {{ $voitures->photo}}
          </div>
          
@endsection