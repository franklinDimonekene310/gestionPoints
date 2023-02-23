<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnneeScolaire;
use Illuminate\Support\Facades\Session;

class AnneeScolaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return view('anneeScolaires.index', [
            'anneeScolaires' => AnneeScolaire::all(), 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('anneeScolaires.create');
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
        $this->validate($request, [
           'anneeDebut' => 'required',
           'anneeFin' => 'required',
        ]); 
         
        try {
            $anneeScolaire = new AnneeScolaire($request->get('anneeDebut'), $request->get('anneeFin'), $request->boolean('etat'));
            $anneeScolaire->save();
           
        } catch (\Exception $e) {
            Session::flash('error', "L'année scolaire' n'a été ajouté suite " . $e->getMessage());
            return back();
        };
        
        Session::flash('success', "L'année a été ajouter avec succès");
        return redirect()->route('anneeScolaires.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnneeScolaire  $anneeScolaire
     * @return \Illuminate\Http\Response
     */
    public function show(AnneeScolaire $anneeScolaire)
    {
        //
         return view('anneeScolaires.show',[
            'anneeScolaire' => $anneeScolaire,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnneeScolaire  $anneeScolaire
     * @return \Illuminate\Http\Response
     */
    public function edit(AnneeScolaire $anneeScolaire)
    {
        //
        return view('anneeScolaires.edit',[
            'anneeScolaire' => $anneeScolaire,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnneeScolaire  $anneeScolaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnneeScolaire $anneeScolaire)
    {
        //
        $this->validate($request, [
            'anneeDebut' => 'required',
            'anneeFin' => 'required',
         ]); 
         
        $anneeScolaire->update([
        'anne_debut' => $request->get('anne_debut'),
        'anne_fin' => $request->get('anne_fin'),
        'etat' => $request->boolean('etat')
        ]);
             
        Session::flash('success', "L'année scolaire a été modifiée avec succès");
        return redirect()->route('anneeScolaires.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnneeScolaire  $anneeScolaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnneeScolaire $anneeScolaire)
    {
        //
        $anneeScolaire->delete();

        Session::flash('success', "L'année scolaire a été supprimé avec succès");
        return redirect()->route('anneeScolaires.index'); 
    }
}
