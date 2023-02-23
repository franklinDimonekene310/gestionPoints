<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TitreApplication;
use Illuminate\Support\Facades\Session;

class TitreApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('titreApplications.index', [
            'titreApplications' => TitreApplication::all(),
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
        return view('titreApplications.create');
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
    
        TitreApplication::create([
            'libelle' => $request->get('libelle'),
            'etat' => $request->boolean('etat'),
        ]);
        Session::flash('success', "Le titre de l'application a été ajouter avec succès");
        return redirect()->route('titreApplications.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TitreApplication  $titreApplication
     * @return \Illuminate\Http\Response
     */
    public function show(TitreApplication $titreApplication)
    {
        //
        return view('titreApplications.show',[
            'titreApplication' => $titreApplication
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TitreApplication  $titreApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(TitreApplication $titreApplication)
    {
        //
        return view('titreApplications.edit',[
            'titreApplication' => $titreApplication
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TitreApplication  $titreApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TitreApplication $titreApplication)
    {
        //
        $this->validate($request, [
            'libelle' => 'required',
             ]);      
    
             TitreApplication::findOrFail($titreApplication->id)->update([
            'libelle' => $request->get('libelle'),
            'etat' => $request->boolean('etat'),
        ]);
        Session::flash('success', "Le titre de l'application a été modifiée avec succès");
        return redirect()->route('titreApplications.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TitreApplication  $titreApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(TitreApplication $titreApplication)
    {
        //
        TitreApplication::findOrFail($titreApplication->id)->delete();

        Session::flash('success', "Le titre de l'application  a été supprimée avec succès");
        return redirect()->route('titreApplications.index');
    }
}
