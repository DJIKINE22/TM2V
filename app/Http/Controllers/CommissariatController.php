<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commissariat;
use App\Models\User;
use App\Models\Agent;
use App\Models\Voiture;
use App\Http\Controllers\CommissariatController;
use App\Http\Controllers\VoitureController;


class CommissariatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // Cette methode permet d'afficher la form
    $commissariats = Commissariat::all();
       return view('Commissaria.index',compact('commissariats'));
    }
    public function dashboard()
    {
       
        $voitures = Voiture::count();
        return view('commissaria.dashboard',compact('$voitures'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // resquest se charge de l'envoi et recuperation de donnees 
        //ici nous allons definir les normes que doivent respectées nos differents champs
        $verification = $request->validate(
            [
                'nom'=>['required','string','max:255'],
                'localite'=>['required','string','max:255'],
                'prenomCommissaire'=>['required','string','max:255'],
                'nomCommissaire'=>['required','string','max:255'],
                'matricule'=>['required','string','max:255'],
                'adresse'=>['required','string','max:255'],
                'email'=>['required','string','max:255'],
                'password'=>['required','string','min:5','confirmed'],
                'telephone'=>['required','string','max:25'],
                
            ]
        );
        //ici nous allons definir les actions à faire si la verification est bonne
        if($verification){
            // nous allons creer un user avec les données saisies
            $user = User::create([
            'name' => $request['nom'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'status' => 'commissaire',
            ]);
            if($user){
                $utilisateur = Commissariat::create(
                    [ 
                        'userId' => $user->id,
                        'nom'=>$request['nom'],
                        'localite'=>$request['localite'],
                        'prenomCommissaire'=>$request['prenomCommissaire'],
                        'nomCommissaire'=>$request['nomCommissaire'],
                        'matricule'=>$request['matricule'],
                        'email'=>$request['email'],
                        'adresse'=>$request['adresse'],
                        'password'=> bcrypt($request['password']),
                        'telephone'=>$request['telephone'],
                        
                    ]
                    );
                    return redirect('/commissariat');
            }

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
        $commissariats = Commissariat::findOrFail($id);
        return view('Commissaria.show', compact('commissariats'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $commissariats = Commissariat::findOrFail($id);
        return view ('/Commissaria/edit', compact(('commissariats')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         //
         $validatedData = $request->validate([
            'nom'=>['required','string','max:255'],
            'localite'=>['required','string','max:255'],
            'prenomCommissaire'=>['required','string','max:255'],
            'nomCommissaire'=>['required','string','max:255'],
            'matricule'=>['required','string','max:255'],
            'adresse'=>['required','string','max:255'],
            'email'=>['required','string','max:255'],
            
            'telephone'=>['required','string','max:25'],
        ]);
    
        Commissariat::whereId($id)->update($validatedData);
    
        return redirect('/commissariat')->with('success', 'Agent mise à jour avec succèss');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $commissariats = Commissariat::findOrFail($id);
        $commissariats->delete();
    
        return redirect('/commissariat')->with('success', 'Reservation supprimer avec succèss');
    }
}
