@extends('layouts.comm')
@section('content')

<h1 class="title fixed">Liste des commissariats</h1>
    <div class="col-md-12 text-right">
        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#add">Ajouter un commissariat</button>
    </div>
    <div id="" class="table responsive">
    <table id="example" class="table table-striped table-bordered  mx-auto" style="width:90%">
        <!-- <table id="mydatatable"  class="table  table-bordered  table-hover table-sm table-responsive table-striped" > -->
            <thead>
                <tr class="text-center">
                <th scope="col" class="text-center">Nom</th>
                <th scope="col" class="text-center">Localite</th>
                <th scope="col" class="text-center">Commissaire</th>
                <th scope="col" class="text-center">Telephone</th>
                <th scope="col" colspan="3" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commissariats as $commissariat)
                    <tr>
                        
                    
                        <td>{{$commissariat->nom}}</td>
                        <td>{{$commissariat->localite}}</td>
                        <td>{{$commissariat->nomCommissaire}}</td>
                        <td>{{$commissariat->telephone}}</td>
                        
                        </td>
                        <td><a href="{{ route('commissariats.show', $commissariat->id)}}" class="btn btn-primary">Details</a></td>
                    <td><a href="{{ route('commissariats.edit',$commissariat->id)}}" class="btn btn-primary">Modifier</a></td>
                        <td>
                            <form action="{{ route('commissariats.destroy', $commissariat->id)}}" method="POST">
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajout Commissariat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md">   
                            <form method="POST" action="{{ route('commissariat.create') }} ">
                                @csrf
                                @method('POST') 
                                <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

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
                            <label for="localite" class="col-md-4 col-form-label text-md-end">{{ __('Localite') }}</label>

                            <div class="col-md-6">
                                <input id="localite" type="text" class="form-control @error('localite') is-invalid @enderror" name="localite" value="{{ old('localite') }}" required autocomplete="localite" autofocus>

                                @error('localite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nomCommissaire" class="col-md-4 col-form-label text-md-end">{{ __('Nom du commissaire') }}</label>

                            <div class="col-md-6">
                                <input id="nomCommissaire" type="text" class="form-control @error('nomCommissaire') is-invalid @enderror" name="nomCommissaire" value="{{ old('nomCommissaire') }}" required autocomplete="nomCommissaire" autofocus>

                                @error('nomCommissaire')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prenomCommissaire" class="col-md-4 col-form-label text-md-end">{{ __('Prenom du commissaire') }}</label>

                            <div class="col-md-6">
                                <input id="prenomCommissaire" type="text" class="form-control @error('prenomCommissaire') is-invalid @enderror" name="prenomCommissaire" value="{{ old('prenomCommissaire') }}" required autocomplete="prenomCommissaire" autofocus>

                                @error('prenomCommissaire')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="matricule" class="col-md-4 col-form-label text-md-end">{{ __('Matricule') }}</label>

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
                            <label for="adresse" class="col-md-4 col-form-label text-md-end">{{ __('Adresse') }}</label>

                            <div class="col-md-6">
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>

                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telephone" class="col-md-4 col-form-label text-md-end">{{ __('Telephone') }}</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"> {{ __('Ajouter') }}</button>
                            </div>
                </form>
    </div>
  </div>
</div>
@endsection