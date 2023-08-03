<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;

    protected $table = 'voyages';

    protected $fillable = [
        'depart',
        'destination',
        'trajet',
        'heur_debut_aller',
        'heur_debut_retour',
        'heur_fin_aller',
        'heur_fin_retour',
        'id_abonnement',
        'id_etat_voyage'
    ];

    public function abonnements() :BelongsTo
    {
        return $this->belongsTo(Abonnement::class);
    }

    public function etat_voyages(): BelongsTo
    {
        return $this->belongsTo(EtatVoyage::class);
    }
}
