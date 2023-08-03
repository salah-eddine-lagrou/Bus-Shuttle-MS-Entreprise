<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'nom',
        'email',
        'adresse',
        'telephone',
        'password'
    ];

    public function entreprises() :hasManyThrough
    {
        return $this->hasManyThrough(
            Entreprise::class,
            ClientEntreprise::class,
            'id_client', // clé étrangère dans la table clientEntreprise qui correspond à l'ID du client
            'id', // clé primaire dans la table entreprises
            'id', // clé primaire dans la table clients
            'id_entreprise' // clé étrangère dans la table clientEntreprise qui correspond à l'ID de l'entreprise
        );
    }

    public function notes_commentaires(): HasMany
    {
        return $this->hasMany(NotesCommentaire::class, 'id_client');
    }

    public function exprimer_abonnements(): HasMany
    {
        return $this->hasMany(ExprimerAbonnement::class, 'id_client');
    }

    public function comptes(): HasMany
    {
        return $this->hasMany(Compte::class, 'id_client');
    }

    public function abonnements() :hasManyThrough
    {
        return $this->hasManyThrough(
            Abonnement::class,
            Paiement::class,
            'id_client', // clé étrangère dans la table paiements qui correspond à l'ID du client
            'id', // clé primaire dans la table abonnements
            'id', // clé primaire dans la table clients
            'id_abonnement' // clé étrangère dans la table paiements qui correspond à l'ID de l'abonnement
        );
    }



}
