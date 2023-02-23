<?php

namespace App\Http\Controllers;

use App\Models\TitrePeriode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TitrePeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('titrePeriodes.index', [
            'titrePeriodes' => TitrePeriode::all(), 
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

        return view('titrePeriodes.create');
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
    
       TitrePeriode::create([
            'libelle' => $request->get('libelle'),
            'etat' => $request->boolean('etat'),
        ]);
        Session::flash('success', "Le titre de la période a été ajouter avec succès");
        return redirect()->route('titrePeriodes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TitrePeriode  $titrePeriode
     * @return \Illuminate\Http\Response
     */
    public function show(TitrePeriode $titrePeriode)
    {
        //
         return view('titrePeriodes.show',[
            'titrePeriode' => $titrePeriode
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TitrePeriode  $titrePeriode
     * @return \Illuminate\Http\Response
     */
    public function edit(TitrePeriode $titrePeriode)
    {
        //
        return view('titrePeriodes.edit',[
            'titrePeriode' => $titrePeriode
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TitrePeriode  $titrePeriode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TitrePeriode $titrePeriode)
    {
        //
        $this->validate($request, [
                'libelle' => 'required',
             ]);      
    
             TitrePeriode::findOrFail($titrePeriode->id)->update([
            'libelle' => $request->get('libelle'),
            'etat' => $request->boolean('etat'),
        ]);
        Session::flash('success', "Le titre de la périodes a été modifiée avec succès");
        return redirect()->route('titrePeriodes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TitrePeriode  $titrePeriode
     * @return \Illuminate\Http\Response
     */
    public function destroy(TitrePeriode $titrePeriode)
    {
        //
        TitrePeriode::findOrFail($titrePeriode->id)->delete();

        Session::flash('success', "Le titre de la période a été supprimé avec succès");
        return redirect()->route('titrePeriodes.index'); 
    }
}
