<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    public function titre_applications()
    {
        return $this->belongsToMany(TitreApplication::class, 'applications',
        'periode_id', 'titre_application_id'
        );
    }

    public function eleve_applications()
    {
       return $this->belongsToMany(Eleve::class, 'applications',
       'periode_id', 'eleve_id',
       );
       
    }

    public function eleve_conduites()
    {
        return $this->belongsToMany(Eleve::class, 'conduites', 'periode_id', 'eleve_id');
    }

    public function titre_conduites()
    {
        return $this->belongsToMany(TitreConduite::class, 'conduites', 'periode_id', 'titre_conduite_id');
    }

    public function cours()
    {
        return $this->belongsToMany(Cour::class, 'ponderation_cour', 
        'cour_id', 'periode_id'
        )->withPivot('maximum');
    }
}
