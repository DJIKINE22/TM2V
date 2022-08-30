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
                <div class="card-header">{{ __('Declaration de la perte') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Voiture.create') }}">
                        @csrf
                        @method('POST') 

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Immatriculation') }}</label>

                            <div class="col-md-6">
                                <input id="immatri" type="text" class="form-control @error('immatri') is-invalid @enderror" name="immatri" value="{{ old('immatri') }}" required autocomplete="immatri" autofocus>

                                @error('immatri')
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
                                <input id="user" type="interger"  name="user" value="{{Auth::user()->id}}" autofocus>

                                @error('couleur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
</div>

                        <div class="row mb-3">
                            <label for="carburant" class="col-md-4 col-form-label text-md-end">{{ __('Carburant') }}</label>

                            <div class="col-md-6">
                                <input id="carburant" type="text" class="form-control @error('carburant') is-invalid @enderror" name="carburant" value="{{ old('carburant') }}" required autocomplete="carburant" autofocus>

                                @error('carburant')
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
    </div>
</div>
@endsection
