<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $table = 'offres';

    protected $fillable = [
        'titre',
        'description',
        'dateFinOffre',
        'image',
        'id_entreprise',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function abonnement(): HasOne
    {
        return $this->hasOne(Abonnement::class, 'id_offre');
    }
}
