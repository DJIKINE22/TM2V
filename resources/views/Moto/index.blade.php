@extends('layouts.commi')
@section('content')

<h1 class="title fixed">Motos recherchées</h1>
    <div class="col-md-12 text-right">
        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#add">Ajouter une declaration</button>
    </div>
    <div id="" class="table responsive">
    <table id="example" class="table table-striped table-bordered  mx-auto" style="width:90%">
        <!-- <table id="mydatatable"  class="table  table-bordered  table-hover table-sm table-responsive table-striped" > -->
            <thead>
                <tr class="text-center">
                <th scope="col" class="text-center">Immatriculation</th>
                <th scope="col" class="text-center">Marque</th>
                <th scope="col" class="text-center">Modele</th>
                <th scope="col" class="text-center">Couleur</th>
                <th scope="col" colspan="3" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($motos as $motos)
                    <tr>
                        
                    
                        <td>{{ $motos->numero_ch}}</td>
                        <td>{{ $motos->marque}}</td>
                        <td>{{ $motos->modele}}</td>
                        <td>{{ $motos->couleur}}</td>
                        
                        </td>
                        <td><a href="{{ route('motos.show', $motos->id)}}" class="btn btn-primary">Details</a></td>
                    <td><a href="{{ route('motos.edit', $motos->id)}}" class="btn btn-primary">Modifier</a></td>
                        <td>
                            <form action="{{ route('motos.destroy', $motos->id)}}" method="POST">
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajout perte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md">   
                        <form method="POST" action="{{ route('Moto.create') }}">
                        @csrf
                        @method('POST') 

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Numero Ch') }}</label>

                            <div class="col-md-6">
                                <input id="numero_ch" type="text" class="form-control @error('numero_ch') is-invalid @enderror" name="numero_ch" value="{{ old('numero_ch') }}" required autocomplete="numero_ch" autofocus>

                                @error('numero_ch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="marque" class="col-md-4 col-form-label text-md-end">{{ __('Marque') }}</label>

                            <div class="col-md-6">
                                <input id="marque" type="text" class="form-control @error('marque') is-invalid @enderror" name="marque" value="{{ old('marque') }}" required autocomplete="marque" autofocus>

                                @error('marque')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="modele" class="col-md-4 col-form-label text-md-end">{{ __('Modele') }}</label>

                            <div class="col-md-6">
                                <input id="modele" type="text" class="form-control @error('modele') is-invalid @enderror" name="modele" value="{{ old('modele') }}" required autocomplete="modele" autofocus>

                                @error('modele')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required autocomplete="photo" autofocus>

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="couleur" class="col-md-4 col-form-label text-md-end">{{ __('Couleur') }}</label>

                            <div class="col-md-6">
                                <input id="couleur" type="color" class="form-control @error('couleur') is-invalid @enderror" name="couleur" value="{{ old('couleur') }}" required autocomplete="couleur" autofocus>

                                @error('couleur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                           

                            <div class="col-md-6">
                                <input id="user"  hidden type="interger"  name="user" value="{{Auth::user()->id}}" autofocus>

                                @error('couleur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
</div>

                       

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="immatri" type="date" class="form-control @error('immatri') is-invalid @enderror" name="date_decla" value="{{ old('date') }}" required autocomplete="immatri" autofocus>

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ajouter') }}
                                </button>
                            </div>
                        </div>
                    </form>
    </div>
  </div>
</div>
@endsection