@extends('layouts.comm')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modification Voiture') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('commissariats.update', $voitures->id) }}" >
                            @csrf
                            @method('PATCH') 

                            <div class="row mb-3">
                                <label for="nom" hidden class="col-md-4 col-form-label text-md-end">{{ __('Immatriculation') }}</label>

                                <div class="col-md-6">
                                    <input id="nom" hidden type="text" class="form-control @error('immatri') is-invalid @enderror" name="immatri" value="{{ $voitures->immatri }}">

                                    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="localite" class="col-md-4 col-form-label text-md-end">{{ __('Marque') }}</label>

                                <div class="col-md-6">
                                    <input id="localite" type="text" class="form-control @error('localite') is-invalid @enderror" name="marque" value="{{ $voitures->marque }}">

                                    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nomCommissaire" class="col-md-4 col-form-label text-md-end">{{ __('Modele') }}</label>

                                <div class="col-md-6">
                                    <input id="nomCommissaire" type="text" class="form-control @error('nomCommissaire') is-invalid @enderror" name="modele" value="{{ $voitures->modele }}" >

                                    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="prenomCommissaire" class="col-md-4 col-form-label text-md-end">{{ __('Carburant') }}</label>

                                <div class="col-md-6">
                                    <input id="prenomCommissaire" type="text" class="form-control @error('prenomCommissaire') is-invalid @enderror" name="carburant" value="{{ $voitures->carburant }}">

                                
                                </div>
                            </div>

                            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Valider') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection