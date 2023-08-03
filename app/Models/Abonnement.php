<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    protected $table = 'abonnements';

    protected $fillable = [
        'nom',
        'description',
        'trajet',
        'duree',
        'prix',
        'id_type_abonnement',
        'depart',
        'destination',
        'heur_debut_aller',
        'heur_debut_retour',
        'heur_fin_aller',
        'heur_fin_retour',
        'id_entreprise',
        'id_offre'
    ];

    public function offres() :BelongsTo
    {
        return $this->belongsTo(Offre::class);
    }

    public function type_abonnements() :BelongsTo
    {
        return $this->belongsTo(TypeAbonnement::class);
    }

    public function entreprises() :BelongsTo
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function vehicules(): HasMany
    {
        return $this->hasMany(Vehicule::class, 'id_abonnement');
    }

    public function voyages(): HasMany
    {
        return $this->hasMany(Voyage::class, 'id_abonnement');
    }

    public function clients() :hasManyThrough
    {
        return $this->hasManyThrough(
            Client::class,
            Paiement::class,
            'id_abonnement', // clé étrangère dans la table paiements qui correspond à l'ID du abonnement
            'id', // clé primaire dans la table abonnements
            'id', // clé primaire dans la table clients
            'id_clients' // clé étrangère dans la table paiements qui correspond à l'ID de client
        );
    }

    public function jours() :hasManyThrough
    {
        return $this->hasManyThrough(
            Jour::class,
            DateAbonnement::class,
            'id_abonnement', // clé étrangère dans la table DateAbonnement qui correspond à l'ID du abonnement
            'id', // clé primaire dans la table abonnements
            'id', // clé primaire dans la table jour
            'id_jour' // clé étrangère dans la table DateAbonnement qui correspond à l'ID de jour
        );
    }
}
