<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $table = 'vehicules';

    protected $fillable = [
        'immatriculation',
        'marque',
        'capacite',
        'dateMiseEnservice',
    ];

    public function entreprise() :BelongsTo
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function abonnements() :BelongsTo
    {
        return $this->belongsTo(Abonnement::class);
    }
}
