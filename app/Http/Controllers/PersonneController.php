<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;

class PersonneController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $personnes = [
            new Personne(['id' =>1, 'name' => 'franklin', 'postnom' => 'nsingi']),
            new Personne(['id' =>2, 'name' => 'tabitha', 'postnom' => 'lusinga']),
            new Personne(['id' =>3, 'name' => 'ninelle', 'postnom' => 'lusien']),
            new Personne(['id' =>4, 'name' => 'wete', 'postnom' => 'christine']),
            new Personne(['id' =>5, 'name' => 'orellie', 'postnom' => 'frank']),
        ];

       
        return view('dashboard.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(){
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(){
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(){
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(){
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classe_new  $classe_new
     * @return \Illuminate\Http\Response
     */
    public function update(){
        
    }
}
