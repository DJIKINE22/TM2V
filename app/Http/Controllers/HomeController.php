<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Agent;
use App\Models\Voiture;
use App\Models\Moto;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\MotoController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $user =  Auth::user();
        //dd($user);
        if($user->status == 'utilisateur'){
            return view('Agent.dash');
        } else if ($user->status == 'agent'){
            // $administrateurs = administrateurs::where('user', $user->id)->first();
            $voitures = Voiture::all();
            return view('Agent.dash');
        }
        else if ($user-> status == 'commissaire'){
            $voitures = Voiture::count();
            $motos = Moto::count();
           

            return view('commissaria.dashboard2',compact('voitures','motos'));
        } 
        else{
            return view('home');
        }
    }
}
