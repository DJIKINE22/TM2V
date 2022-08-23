<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Cette methode permet d'afficher la form
        return view('Admin.dashboard');
    }
    public function dashboard(){
        return view('Admin.dashboard');
    }
    public function liste(Request $request)
    {
        $commissariats = Commissariat::all();
        return view('Commissaria.index' , compact('commissariats'));
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
            'status'=>'administratreur',
            'password' => bcrypt($request['password']),
            
            ]);
            if($user){
                $adimin = Admin::create(
                    [ 
                        'userId' => $user->id,
                        'nom'=>$request['nom'],
                        'prenom'=>$request['prenom'],
                        'email'=>$request['email'],
                        'password'=> bcrypt($request['password']),
                        'telephone'=>$request['telephone'],
                        'status'=>'administratreur',
                        
                    ]
                    );
                    return redirect('/login');
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
    }
}
