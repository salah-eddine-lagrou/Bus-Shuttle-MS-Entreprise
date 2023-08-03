<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAbonnement extends Model
{
    use HasFactory;

    protected $table = 'type_abonnements';

    protected $fillable = [
        'description',
        'nom'
    ];

    public function exprimer_abonnements(): HasMany
    {
        return $this->hasMany(ExprimerAbonnement::class, 'id_type_abonnement');
    }

    public function abonnements(): HasMany
    {
        return $this->hasMany(Abonnement::class, 'id_type_abonnement');
    }
}
