<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\Commissariat;
use App\Models\Agent;
use App\Models\User;
use App\Models\Voiture;
use App\Models\Moto;
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
       $agents = Agent::orderBy('created_at' ,'desc')-> paginate(5);
        

      $commissariats = Commissariat::all();
       return view('Agent.index', compact('commissariats','commissariats','agents'));
    }
    public function agentvoi(){
        $voitures = Voiture::orderBy('created_at' ,'desc')-> paginate(5);
         return view('Voiture.indexv', compact('voitures'));

    }
    public function agentmo(){
        $motos = Moto::orderBy('created_at' ,'desc')-> paginate(5);
         return view('Agent.dash', compact('motos'));

    }
    public function liste()
    {
      $commissariats = Commissariat::all();

        $agents = Agent::orderBy('created_at' ,'desc')-> paginate(4);
        return view('Agent.index2' , compact('agents','commissariats'));
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
                        'status' => 'agent',
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
                    return redirect('/agent')->with('Bravo', 'Agent creer avec succes');
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
            $agents = Agent::findOrFail($id);
            return view('/Agent/show3', compact('agents'));
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
                'telephone'=>['required','string','max:25'],
        ]);
    
        Agent::whereId($id)->update($validatedData);
    
        return redirect('/agent')->with('success', 'Agent mise à jour avec succèss');
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
