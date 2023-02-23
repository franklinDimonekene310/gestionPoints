<?php

namespace App\Http\Controllers;

use App\Models\TitreCour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TitreCourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('titreCours.index', [
            'titreCours' => TitreCour::all(), 
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
        return view('titreCours.create');
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
    
       TitreCour::create([
            'libelle' => $request->get('libelle'),
            'etat' => $request->boolean('etat'),
        ]);
        Session::flash('success', "Le titre du cour a été ajouter avec succès");
        return redirect()->route('titreCours.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TitreCour  $titreCour
     * @return \Illuminate\Http\Response
     */
    public function show(TitreCour $titreCour)
    {
        //
        return view('titreCours.show',[
            'titreCour' => $titreCour
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TitreCour  $titreCour
     * @return \Illuminate\Http\Response
     */
    public function edit(TitreCour $titreCour)
    {
        //
        return view('titreCours.edit',[
            'titreCour' => $titreCour
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TitreCour  $titreCour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TitreCour $titreCour)
    {
        //
            $this->validate($request, [
                'libelle' => 'required',
             ]);      
    
             TitreCour::findOrFail($titreCour->id)->update([
            'libelle' => $request->get('libelle'),
            'etat' => $request->boolean('etat'),
        ]);
        Session::flash('success', "Le titre du cours a été modifiée avec succès");
        return redirect()->route('titreCours.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TitreCour  $titreCour
     * @return \Illuminate\Http\Response
     */
    public function destroy(TitreCour $titreCour)
    {
        //
     TitreCour::findOrFail($titreCour->id)->delete();

        Session::flash('success', "Le titre du cours a été supprimé avec succès");
        return redirect()->route('titreCours.index');   
    }
}
