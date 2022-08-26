@extends('layouts.comm')
@section('content')
<div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card  text-white mb-4 " id="card1">
                                    <div class="card-body">
                                    <div class="text">
                                            <h1>{{$agents}}<i class="fa fa-car" style="margin:auto"></i></h1>
                                                <span>Voiture récherchées</span>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Voir Plus</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white mb-4" id="card2">
                                    <div class="card-body">
                                        <div class="text">
                                            <h1>8<i class="fa fa-car" style="margin:auto"></i></h1>
                                                <span>Voitures retrouvées</span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Voir Plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card  text-white mb-4" id="card3">          
                                <div class="card-body ">
                                                <div class="icon">
                                                    
                                                </div>
                                                <div class="text">
                                                    <h1>5O<i class="fa fa-motorcycle" style="margin:auto"></i></h1>
                                                    <span>Motos recherchées</span>
                                                </div>
                                            </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Voir Plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card  text-white mb-4 "id="card4">          
                                <div class="card-body ">
                                                <div class="icon">
                                                    
                                                </div>
                                                <div class="text">
                                                    <h1>20<i class="fa fa-motorcycle" style="margin:auto"></i></h1>
                                                    <span>Motos retrouvées</span>
                                                </div>
                                            </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Voir Plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="row center">
                    <div class=" col d-flex justify-content-center">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <h3 class="title-2 m-b-40"></h3>
                                    <canvas id="sales-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection