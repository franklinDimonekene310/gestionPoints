<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['libelle', 'etat'];

    public function titre_cours()
    {
        return $this->belongsToMany(TitreCour::class, 'cours', 'classe_id', 'titre_cour_id')->withTimestamps();
    }


    public function classe_annees()
    {
        return $this->belongsToMany(AnneeScolaire::class,'scolarites',
        'classe_id', 'annee_scolaire_id');
    }

    public function classe_eleves()
    {
        return $this->belongsToMany(Eleve::class, 'scolarites',
        'classe_id', 'eleve_id');
    }
}
