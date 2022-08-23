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
        //
        $voitures = Voiture::all();

    return view('index', compact('voitures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
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
        $validatedData = $request->validate([
            'code' => 'required',
            'entreprise' => 'required',
            
        ]);
    
        $voitures = Vol::create($validatedData);
    
        return redirect('/voitures')->with('perte signaler  avec succèss');
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

            $vol = Vol::findOrFail(2);

            

        } 

        catch (ModelNotFoundException $e) {

            

        }

        catch (Throwable $e) {

            \Log::error('Erreur inattendue : ', [$e]);

        }
        return view('show', compact('vol'));
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
        $vol = Vol::findOrFail($id);

        return view('edit', compact('vol'));
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
        'code' => 'required',
        'date_depart' => 'required',
        'heure_depart' => 'required',
        'nbre_plc_classA' => 'required',
        'nbre_plc_classB' => 'required',
        'prixA' => 'required',
        'prixB' => 'required',
    ]);

    Vol::whereId($id)->update($validatedData);

    return redirect('/vols')->with('success', 'Vol mise à jour avec succèss');
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
        $vol = Vol::findOrFail($id);
        $vol->delete();
    
        return redirect('/vols')->with('success', 'Vol supprimer avec succèss');
    }
}
