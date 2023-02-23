<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cote extends Model
{
    use HasFactory;

    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'eleve_id', 'id');
    }


    public function ponderation_cour()
    {
        return $this->belongsTo(PonderationCour::class, 'ponderation_cour_id', 'id');
    }


}
