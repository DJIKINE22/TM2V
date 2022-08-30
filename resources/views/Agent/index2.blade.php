@extends('layouts.comm')
@section('content')
<!-- <style>
  
  .card {
    
    margin: auto;
   
    
   
  }
  .card-header {
    
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
</style> -->
<h1 class="title fixed">Liste des agents</h1>
    <div class="col-md-12 text-right">
        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#add">Ajouter un agent</button>
    </div>
    <div id="" class="table responsive">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <!-- <table id="mydatatable"  class="table  table-bordered  table-hover table-sm table-responsive table-striped" > -->
            <thead>
                <tr class="text-center">
                <th scope="col">Matricule</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Telephone</th>
                <th scope="col" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agents as $agents)
                    <tr>
                        
                        <td>{{$agents->matricule}}</td>
                        <td>{{$agents->nom}}</td>
                        <td>{{$agents->prenom}}</td>
                        <td>{{$agents->telephone}}</td>
                        
                        </td>
                        <td><a href="{{ route('agents.show', $agents->id)}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail"  >Details</a></td>
                        <td><a href="{{ route('agents.show', $agents->id)}}" class="btn btn-primary"> <button>Detail</button></a></td>
                        <td><a href="{{ route('agents.edit2', $agents->id)}}" class="btn btn-primary">Modifier</a></td>
                        <td>
                            <form action="" method="post">
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
    <!-- Modal -->
    


    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Agent</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md">   
                            <form method="POST" action="{{ route('Agent.create') }} ">
                                @csrf
                                @method('POST') 
                                <div class="row mb-3">
                                    <label for="nom" class="col-md-3 ml-4 col-form-label">{{ __('Nom') }}</label>
                                        <div class="col-md-6">
                                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
                                            @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="prenom" class="col-md-3 ml-4 col-form-label ">{{ __('Prenom ') }}</label>
                                        <div class="col-md-6">
                                        <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
                                        @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                </div>
                                    <div class="row mb-3">
                                        <label for="matricule" class="col-md-3 ml-4 col-form-label ">{{ __('Matricule') }}</label>
                                        <div class="col-md-6">
                                            <input id="matricule" type="text" class="form-control @error('prenomCommissaire') is-invalid @enderror" name="matricule" value="{{ old('matricule') }}" required autocomplete="matricule" autofocus>
                                            @error('matricule')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="adresse" class="col-md-3 ml-4 col-form-label ">{{ __('Adresse') }}</label>
                                        <div class="col-md-6">
                                            <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>
                                            @error('adresse')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3" >
                                        <label for="enteprise" class="col-md-4 col-form-label text-md-end">{{ __('Commissariat') }}</label>
                                        <div class="col-md-6">
                                            <select name="commissariat">
                                                @foreach($commissariats as $commissariats)
                                                <option value="{{$commissariats->id }}">{{$commissariats->nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-3 ml-4 col-form-label ">{{ __('Email ') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password" class="col-md-3 ml-4 col-form-label">{{ __('Password') }}</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-3 ml-4 col-form-label ">{{ __('Confirm Password') }}</label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="telephone" class="col-md-3 ml-4 col-form-label ">{{ __('Telephone') }}</label>

                                        <div class="col-md-6">
                                            <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>

                                            @error('telephone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            
                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"> {{ __('Ajouter') }}</button>
                            </div>
                </form>
    </div>
    <!-- <div class="modal-dialog modal-lg">
    <div class="modal fad" id="detaile" tabindex="-1" aria-labelledby="detail" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detail">Créer Agent</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md">   
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
    </div> -->



    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  
</button>

<!-- Modal -->


    </div>
   
  </div>

</div>
<div class="modal-dialog modal-lg">
<div class="modal fade" id="detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detail" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detail">Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="row justify-content-center">
                        <div class="col-md">   
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>
</div>
@endsection