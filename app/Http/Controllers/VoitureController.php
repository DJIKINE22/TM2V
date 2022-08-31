<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Voiture;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\VehiculeController;
use App\Models\Vehicule;
use App\Models\perte;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // Cette methode permet d'afficher la form

            
            $voitures = Voiture::orderBy('created_at' ,'desc')-> paginate(5);
                
            
            
            return view('Voiture.index', compact('voitures'));
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
                'immatri'=>['required','string','max:255'],
                'marque'=>['required','string','max:255'],
                'modele'=>['required','string','max:255'],
                'couleur'=>['required','string','max:255'],
                'photo'=>['required','string','max:255'],
                'carburant'=>['required','string','max:25'],
                
                
            ]
        );
        //ici nous allons definir les actions à faire si la verification est bonne
        if($verification){
            
            // nous allons creer un user avec les données saisies
            $vehicule = Vehicule::create([
            'marque' => $request['marque'],
            'modele' => $request['modele'],
            'couleur' => $request['couleur'],
            'status' => 'recherché',
            ]);
            if($vehicule){
                $users = Auth::user()->id;
                
               
                $perte = Perte::create(
                    [ 
                        'user'  => $users,
                        'vehicule' => $vehicule->id,
                        'date_decla'=>$request['date_decla'],
                    ]
                    );}
                    if($perte){
                        $voi = Voiture::create(
                            [ 
                                'immatri'=>$request['immatri'],
                                'marque'=>$request['marque'],
                                'modele'=>$request['modele'],
                                'couleur'=>$request['couleur'],
                                'photo'=>$request['photo'],
                                'carburant'=>$request['immatri'],
                                'vehicule'=>$vehicule->id,
                                
                            ]
                            );
                    return redirect('/vehicule');
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
        

            $agents = Voiture::findOrFail(2);

            

        return view('Agent.show3', compact('agents'));
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
        $agents =  Voiture::findOrFail($id);
    
        return view ('agent.edit2', compact(('agents')));

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
        $validatedData = $request->validate([
            'nom'=>['required','string','max:255'],
                'prenom'=>['required','string','max:255'],
                'matricule'=>['required','string','max:255'],
                'adresse'=>['required','string','max:255'],
                'email'=>['required','string','max:255'],
                'password'=>['required','string','min:5','confirmed'],
                'telephone'=>['required','string','max:25'],
        ]);
    
        Voiture::whereId($id)->update($validatedData);
    
        return redirect('/voiture')->with('success', 'Agent mise à jour avec succèss');
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
        $voitures = Voiture::findOrFail($id);
        $voitures->delete();
    
        return redirect('/voiture')->with('success', 'Reservation supprimer avec succèss');
    }
}
