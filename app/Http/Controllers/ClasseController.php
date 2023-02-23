<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class ClasseController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    //     if(! Gate::allows('acces-admin')){
    //         abort('403');
    //    }
        
        //
       // 
    //    if(Auth::check()) {
    //     // dd('je suis connecté ' . Auth::user()->name);
    //      dd(Auth::user());
    //    } else {
    //     dd('je ne suis pas connecté');

    //    }

//    $cl = Classe::where('etat',1)->first();

//    dd($cl);

       

      
       return view('classes.index', [
        'classes' => Classe::all(),
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
       return view('classes.create');
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
        
            Classe::create([
                'libelle' => $request->get('libelle'),
                'etat' => $request->boolean('etat'),
            ]);
            Session::flash('success', "La classe a été ajouter avec succès");
            return redirect()->route('classes.index');
        

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
        
        return view('classes.show',[
            'classe' => Classe::findOrFail($id)
        ]);
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
       
        return view('classes.edit', [
            'classe' => Classe::find($id),
                ]);
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

        $this->validate($request, [
            'libelle' => 'required',
             ]);      
    
        Classe::findOrFail($id)->update([
            'libelle' => $request->get('libelle'),
            'etat' => $request->boolean('etat'),
        ]);
        Session::flash('success', "La classe a été modifiée avec succès");
        return redirect()->route('classes.index');
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
           
        Classe::findOrFail($id)->delete();

        Session::flash('success', "La classe a été supprimée avec succès");
        return redirect()->route('classes.index');
    }
}
