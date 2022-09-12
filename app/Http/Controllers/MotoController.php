<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Moto;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\VehiculeController;
use App\Models\Vehicule;
use App\Models\perte;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // Cette methode permet d'afficher la form

            
            $motos =Moto::orderBy('created_at' ,'desc')-> paginate(5);
            $commissariats = Moto::count();   
            
            
            return view('Moto.index', compact('motos'));
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
                'numero_ch'=>['required','string','max:255'],
                'marque'=>['required','string','max:255'],
                'modele'=>['required','string','max:255'],
                'couleur'=>['required','string','max:255'],
                'photo'=>['required','string','max:255'],
                
                
                
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
                        $moto = Moto::create(
                            [ 
                                'numero_ch'=>$request['numero_ch'],
                                'marque'=>$request['marque'],
                                'modele'=>$request['modele'],
                                'couleur'=>$request['couleur'],
                                'photo'=>$request['photo'],
                                'carburant'  => 'essence',
                                'vehicule'=>$vehicule->id,
                                
                            ]
                            );
                    return redirect('/motos');
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
        

            $motos = Moto::findOrFail($id);

            

        return view('moto.show', compact('motos'));
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
        $motos =  Moto::findOrFail($id);
    
        return view ('agent.edit', compact(('motos')));

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
    
        return redirect('/motos')->with('success', 'Agent mise à jour avec succèss');
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
        $motos = Moto::findOrFail($id);
        $motos->delete();
    
        return redirect('/motos')->with('success', 'Reservation supprimer avec succèss');
    }
}
