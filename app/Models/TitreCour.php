<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitreCour extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'etat'];

    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'cours', 'titre_cour_id', 'classe_id' )->withTimestamps();
    }
}
