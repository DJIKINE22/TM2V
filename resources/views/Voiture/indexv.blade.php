@extends('layouts.agent')
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
<h1 class="title fixed">Liste des voitures</h1>
    <div class="col-md-12 text-right">
        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#add">Ajouter un agent</button>
    </div>
    <div id="" class="table responsive">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <!-- <table id="mydatatable"  class="table  table-bordered  table-hover table-sm table-responsive table-striped" > -->
            <thead>
                <tr class="text-center">
                <th scope="col">Immatriculation</th>
                <th scope="col">Marque</th>
                <th scope="col">Modele</th>
                <th scope="col">Couleur</th>
                <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($voitures as $voitures)
                    <tr>
                        
                        <td>{{$voitures->immatri}}</td>
                        <td>{{$voitures->marque}}</td>
                        <td>{{$voitures->modele}}</td>
                        <td>{{$voitures->couleur}}</td>
                        
                        </td>
                       
                        <td><a href="{{ route('voitures.show', $voitures->id)}}" class="btn btn-primary"> <button>Detail</button></a></td>
                        
                        
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
                    <h5 class="modal-title" id="exampleModalLabel">Detail voiture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md">   
                            <form method="POST" action="{{ route('Voiture.create') }} ">
                                @csrf
                                @method('POST') 
                                
                        <div class="row mb-3">
                            <label for="Immatriculation" class="col-md-4 col-form-label text-md-end">{{ __('Immatriculation') }}</label>

                            <div class="col-md-6">
                                <input id="Immatriculation" type="text" class="form-control @error('immatri') is-invalid @enderror" name="immatri" value="{{ old('immatri') }}" required autocomplete="immatri" autofocus>

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
                                <input id="marque" type="text" class="form-control @error('marque') is-invalid @enderror" name="marque" value="{{ old('marque') }}" required autocomplete="localite" autofocus>

                                @error('localite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nomCommissaire" class="col-md-4 col-form-label text-md-end">{{ __('Modele') }}</label>

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
                            <label for="couleur" class="col-md-4 col-form-label text-md-end">{{ __('Couleur') }}</label>

                            <div class="col-md-6">
                                <input id="couleur" type="couleur" class="form-control @error('couleur') is-invalid @enderror" name="couleur" value="{{ old('couleur') }}" required autocomplete="couleur" autofocus>

                                @error('couleur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <input id="photo" type="text" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required autocomplete="photo" autofocus>

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="adresse" class="col-md-4 col-form-label text-md-end">{{ __('Carbuant') }}</label>

                            <div class="col-md-6">
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="carbuant" value="{{ old('carbuant') }}" required autocomplete="carbuant" autofocus>

                                @error('carbuant')
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
    



    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  
</button>

<!-- Modal -->


    </div>
   
  </div>

</div>

    </div>
  </div>
</div>
</div>
@endsection