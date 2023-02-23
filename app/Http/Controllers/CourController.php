<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Classe;
use App\Models\TitreCour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        return view('cours.index', [
            'cours' => Cour::all(), 
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
        
        return view('cours.create', [
            'classes' => Classe::all(),
            'titreCours' => TitreCour::all(),
        ]);
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
           'classe' => 'required',
           'titreCour' => 'required',
        ]); 
         
        try {
        Classe::find($request->get('classe'))->titre_cours()->attach($request->get('titreCour'), [
        'etat' => $request->boolean('etat'),
        ]);
    } catch (\Exception $e) {
        Session::flash('error', "Le cours n'a été ajouté suite " . $e->getMessage());
        return back();
    };
    
   
    //    TitrePeriode::create([
    //         'libelle' => $request->get('libelle'),
    //         'etat' => $request->boolean('etat'),
    //     ]);
        Session::flash('success', "Le cours a été ajouter avec succès");
        return redirect()->route('cours.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function show(Cour $cour)
    {
        //
         return view('cours.show',[
            'titrePeriode' => $cour,
            'classes' => Classe::all(),
            'titreCours' => TitreCour::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function edit(Cour $cour)
    {
        //
       
         return view('cours.edit',[
            'cour' => $cour,
            'classes' => Classe::all(),
            'titreCours' => TitreCour::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cour $cour)
    {
        //
        //  $this->validate($request, [
        //         'libelle' => 'required',
        //      ]); 
        
       //dd($cour);

       $cour->classe_id = $request->get('classe');
       $cour->titre_cour_id = $request->get('titreCour');
       $cour->etat = $request->boolean('etat');
       $cour->save();
             
             /* Classe::find($request->get('classe'))->titre_cours()->updateExistingPivot($request->get('titreCour'), [
                'etat' => $request->boolean('etat'),
            ] );*/
    
            //  TitrePeriode::findOrFail($titrePeriode->id)->update([
            // 'libelle' => $request->get('libelle'),
            // 'etat' => $request->boolean('etat'),
        // ]);
        Session::flash('success', "Le courss a été modifiée avec succès");
        return redirect()->route('cours.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cour $cour)
    {
        //
        Cour::findOrFail($cour->id)->delete();

        Session::flash('success', "Le cours a été supprimé avec succès");
        return redirect()->route('cours.index'); 
    }
}
