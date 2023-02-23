<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitrePeriode extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'etat'];
    
    public function annee_scolaires()
    {
        return $this->belongsToMany(AnneeScolaire::class, 'periodes', 'titre_periode_id','annee_id',);
    }
}
