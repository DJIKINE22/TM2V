@extends('layouts.comm')
@section('content')
@if ($errors->any())

<div class="alert alert-danger">

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

</div>

@endif
<form  style="width:50%;margin:auto;" method="post" action="{{ route('agents.update', $agents->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="code">Matricule :</label>
              <input hidden type="text" class="form-control" name="matricule" value="{{ $agents->matricule }}" disable/>
          </div>

          <div class="form-group">
              <label for="date">Nom :</label>
              <input type="text" class="form-control" name="nom" value="{{ $agents->nom }}"/>
          </div>
          <div class="form-group">
              <label for="text">Prenom :</label>
              <input type="text" class="form-control" name="prenom" value="{{ $agents->prenom }}"/>
          </div>
          <div class="form-group">
              <label for="plcA">Adresse :</label>
              <input type="text" class="form-control" name="adresse" value="{{ $agents->adresse }}"/>
          </div>
          <div class="form-group">
              <label for="plcB">Email:</label>
              <input type="email" class="form-control" name="email" value="{{ $agents->email }}"/>
          </div>
          <div class="form-group">
              <label for="telephone">Telephone:</label>
              <input type="tel" class="form-control" name="telephone" value="{{ $agents->telephone }}"/>
          </div>
        
          <button type="submit" class="btn btn-primary">Modifier</button>
</form>
@endsection