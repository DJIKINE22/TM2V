<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\Commissariat;
use App\Models\Agent;
use App\Models\User;
use App\Http\Controllers\AgentController;

class AgentController extends Controller
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
      
      $commissariats = Commissariat::all();
       return view('Agent.create', compact('commissariats','commissariats'));
    }
    public function liste()
    {
      $commissariats = Commissariat::all();

        $agents = Agent::all();
        return view('Agent.index' , compact('agents','commissariats'));
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
                'prenom'=>['required','string','max:255'],
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
            'status' => 'utilisateur',
            ]);
            if($user){
                $agent = Agent::create(
                    [ 
                        'userId' => $user->id,
                        'nom'=>$request['nom'],
                        'prenom'=>$request['prenom'],
                        'matricule'=>$request['matricule'],
                        'adresse'=>$request['adresse'],
                        'email'=>$request['email'],
                        'password'=> bcrypt($request['password']),
                        'telephone'=>$request['telephone'],
                        'commissariat'=>$request['commissariat'],
                        
                        'status' => 'agent',
                    ]
                    );
                    return redirect('/voiture')->with('Bravo', 'Agent creer avec succes');
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
        return view('Agent.show', compact('agents'));
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
    
        return view ('agent.edit', compact(('agents')));

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
