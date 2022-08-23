<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Agent;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;

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
            return view('Utilisateur.dash');
        } else if ($user->status == 'administratreur'){
            // $administrateurs = administrateurs::where('user', $user->id)->first();
            return view('Admin.dashboard');
        }
        else if ($user-> status == 'commissaire'){
            $agents = Agent::count();
            return view('commissaria.dashboard',compact('agents'));
        } 
        else{
            return view('home');
        }
    }
}
