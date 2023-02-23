<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitreApplication extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'etat'];
    
    public function periodes()
    {
        return $this->belongsToMany(Periode::class, 'applications',
        'titre_application_id', 'periode_id'
        );
    }

    public function eleves()
    {
       return $this->belongsToMany(Eleve::class, 'applications',
       'titre_application_id', 'eleve_id',
       );
       
    }
}
