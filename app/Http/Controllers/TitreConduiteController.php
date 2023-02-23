<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TitreConduite;
use Illuminate\Support\Facades\Session;

class TitreConduiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('titreConduites.index', [
            'titreConduites' => TitreConduite::all(), 
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
        return view('titreConduites.create');
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
            'libelle' => 'required',
    ]);      
    
       TitreConduite::create([
            'libelle' => $request->get('libelle'),
            'etat' => $request->boolean('etat'),
        ]);
        Session::flash('success', "Le titre de la conduite a été ajouter avec succès");
        return redirect()->route('titreConduites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TitreConduite  $titreConduite
     * @return \Illuminate\Http\Response
     */
    public function show(TitreConduite $titreConduite)
    {
        //
        return view('titreConduites.show',[
            'titreConduite' => $titreConduite
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TitreConduite  $titreConduite
     * @return \Illuminate\Http\Response
     */
    public function edit(TitreConduite $titreConduite)
    {
        //
        return view('titreConduites.edit',[
            'titreConduite' => $titreConduite
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TitreConduite  $titreConduite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TitreConduite $titreConduite)
    {
        //
        $this->validate($request, [
            'libelle' => 'required',
             ]);      
    
             TitreConduite::findOrFail($titreConduite->id)->update([
            'libelle' => $request->get('libelle'),
            'etat' => $request->boolean('etat'),
        ]);
        Session::flash('success', "Le titre de la conduite a été modifiée avec succès");
        return redirect()->route('titreConduites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TitreConduite  $titreConduite
     * @return \Illuminate\Http\Response
     */
    public function destroy(TitreConduite $titreConduite)
    {
        //
        TitreConduite::findOrFail($titreConduite->id)->delete();

        Session::flash('success', "Le titre de la conduite  a été supprimée avec succès");
        return redirect()->route('titreConduites.index');
    }
}
