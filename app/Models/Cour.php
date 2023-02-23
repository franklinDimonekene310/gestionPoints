<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;

    protected $fillable = ['classe_id', 'titre_cour_id'];

    public function periodes()
    {
        return $this->belongsToMany(Periode::class, 'ponderation_cour', 
        'periode_id', 'cour_id',
        )->withPivot('maximum');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id','id');
    }

    public function titreCour()
    {
        return $this->belongsTo(TitreCour::class, 'titre_cour_id','id');
    }
}
