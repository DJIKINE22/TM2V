<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Voiture;

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

            $commissariats = Agent::count();
            $agents = Agent::orderBy('created_at' ,'desc')-> paginate(5);
                

            $commissariats = Commissariat::all();
            return view('Agent.index', compact('commissariats','commissariats','agents'));
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
                'carburant'=>['required','string','min:5','confirmed'],
                
                
            ]
        );
        //ici nous allons definir les actions à faire si la verification est bonne
        if($verification){
            // nous allons creer un user avec les données saisies
            $vehi = Vehicule::create([
            'marque' => $request['marque'],
            'modele' => $request['modele'],
            'couleur' => $request['couleur'],
            'status' => 'recherché',
            ]);
            if($vehi){
                $perte = Perte::create(
                    [ 
                        'user' => $user-> Auth::id(),
                        'vehicule' => $vehi->id(),
                        'date'=>$request['date'],
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
                            ]
                            );
                    return redirect('/vehicule')->with('Bravo', 'Agent creer avec succes');
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
        try {

            $agents = Agent::findOrFail(2);

            

        } 

        catch (ModelNotFoundException $e) {

            

        }

        catch (Throwable $e) {

            \Log::error('Erreur inattendue : ', [$e]);

        }
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
        $agents =  Agent::findOrFail($id);
    
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
    
        Vol::whereId($id)->update($validatedData);
    
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
        $agents = Agent::findOrFail($id);
        $agents->delete();
    
        return redirect('/voiture')->with('success', 'Reservation supprimer avec succèss');
    }
}
