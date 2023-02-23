<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitreConduite extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'etat'];

    public function eleves()
    {
        return $this->belongsToMany(Eleve::class, 'conduites',
        'titre_conduite_id', 'eleve_id'        
    );
    }

    public function periodes()
    {
        return $this->belongsToMany(Periode::class, 'conduites', 'titre_conduite_id', 'periode_id'); 
    }
}
