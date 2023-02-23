<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    use HasFactory;

    protected $fillable = ['anne_debut',
    'anne_fin',
    'etat'];

    protected $anne_debut;
    protected $anne_fin;
    protected $etat;


    public function __construct($anne_debut, $anne_fin, $etat)
    {
        $this->anne_debut = $anne_debut;
        $this->anne_fin = $anne_fin;
        $this->etat = $etat;
    }

    public function titre_periodes()
    {
        return $this->belongsToMany(TitrePeriode::class, 'periodes', 'annee_id','titre_periode_id');
    }

    public function eleves()
    {
        return $this->belongsToMany(Eleve::class, 'scolarites',
        'annee_scolaire_id', 'elelve_id');
    }

    public function classe_operationnelles()
    {
        return $this->belongsToMany(Classe::class, 'scolarites',
        'annee_scolaire_id','classe_id');
    }
}
