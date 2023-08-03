<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatVoyage extends Model
{
    use HasFactory;

    protected $table = 'etat_voyages';

    protected $fillable = [
        'nom'
    ];

    public function voyages(): HasMany
    {
        return $this->hasMany(Voyage::class, 'id_etat_voyage');
    }
}
