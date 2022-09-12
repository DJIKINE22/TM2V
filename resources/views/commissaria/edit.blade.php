@extends('layouts.commi')
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
                    <div class="card-header">{{ __('Modification Commissariat') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('commissariats.update', $commissariats->id) }}" >
                            @csrf
                            @method('PATCH') 

                            <div class="row mb-3">
                                <label for="nom" hidden class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="nom" hidden type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $commissariats->matricule }}">

                                    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="localite" class="col-md-4 col-form-label text-md-end">{{ __('Localite') }}</label>

                                <div class="col-md-6">
                                    <input id="localite" type="text" class="form-control @error('localite') is-invalid @enderror" name="localite" value="{{ $commissariats->localite }}">

                                    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nomCommissaire" class="col-md-4 col-form-label text-md-end">{{ __('Nom du commissaire') }}</label>

                                <div class="col-md-6">
                                    <input id="nomCommissaire" type="text" class="form-control @error('nomCommissaire') is-invalid @enderror" name="nomCommissaire" value="{{ $commissariats->nomCommissaire }}" >

                                    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="prenomCommissaire" class="col-md-4 col-form-label text-md-end">{{ __('Prenom du commissaire') }}</label>

                                <div class="col-md-6">
                                    <input id="prenomCommissaire" type="text" class="form-control @error('prenomCommissaire') is-invalid @enderror" name="prenomCommissaire" value="{{ $commissariats->prenomCommissaire }}">

                                
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="matricule" class="col-md-4 col-form-label text-md-end">{{ __('Matricule') }}</label>

                                <div class="col-md-6">
                                    <input id="matricule" type="text" class="form-control @error('prenomCommissaire') is-invalid @enderror" name="matricule" value="{{ $commissariats->matricule }}">

                                
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="adresse" class="col-md-4 col-form-label text-md-end">{{ __('Adresse') }}</label>

                                <div class="col-md-6">
                                    <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ $commissariats->adresse }}">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $commissariats->email}}">
                                
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="telephone" class="col-md-4 col-form-label text-md-end">{{ __('Telephone') }}</label>

                                <div class="col-md-6">
                                    <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ $commissariats->telephone }}">

                                
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