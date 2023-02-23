<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    public function periodes_applications()
    {
        return $this->belongsToMany(Periode::class, 'applications',
        'eleve_id',
        'periode_id');
    }

    public function titre_applications()
    {
       return $this->belongsToMany(TitreApplication::class, 'applications',
       'eleve_id',
       'titre_application_id');
       
    }

    public function titre_conduites()
    {
       return $this->belongsToMany(TitreConduite::class, 'conduites',
       'eleve_id',
       'titre_conduite_id');
       
    }

    public function eleve_annees()
    {
        return $this->belongsToMany(AnneeScolaire::class, 'scolarites',
        'eleve_id', 'annee_scolaire_id');
    }

    public function eleve_classes()
    {
        return $this->belongsToMany(Classe::class,'scolarites',
        'eleve_id', 'classe_id');
    }

    public function cotes()
    {
        return $this->hasMany(Cote::class, 'eleve_id');
    }
}
