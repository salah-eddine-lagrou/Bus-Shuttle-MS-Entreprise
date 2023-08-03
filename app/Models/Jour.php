<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jour extends Model
{
    use HasFactory;

    protected $table = 'jours';

    protected $fillable = [
        'nom'
    ];

    public function abonnements() :hasManyThrough
    {
        return $this->hasManyThrough(
            Abonnement::class,
            DateAbonnement::class,
            'id_jour', // clé étrangère dans la table DateAbonnement qui correspond à l'ID du jour
            'id', // clé primaire dans la table abonnements
            'id', // clé primaire dans la table jour
            'id_abonnement' // clé étrangère dans la table DateAbonnement qui correspond à l'ID de abonnement
        );
    }
}
