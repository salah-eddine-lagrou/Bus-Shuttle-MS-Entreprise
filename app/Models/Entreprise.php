<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Entreprise extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;



    protected $table = 'entreprises';

    protected $fillable = [
        'nom',
        'email',
        'adresse',
        'telephone',
        'password',
        'description',
        'siteWeb',
        'secteur',
        'image'
    ];

    public function clients()
    {
        return $this->hasManyThrough(
            Client::class,
            ClientEntreprise::class,
            'id_entreprise', // clé étrangère dans la table clientEntreprise qui correspond à l'ID de l'entreprise
            'id', // clé primaire dans la table clients
            'id', // clé primaire dans la table entreprises
            'id_client' // clé étrangère dans la table clientEntreprise qui correspond à l'ID du client
        );
    }

    public function abonnements(): HasMany
    {
        return $this->hasMany(Abonnement::class, 'id_entreprise');
    }

    public function offres(): HasMany
    {
        return $this->hasMany(Offre::class, 'id_entreprise');
    }

    public function vehicules(): HasMany
    {
        return $this->hasMany(Vehicule::class, 'id_entreprise');
    }

    public function notesCommentaire(): HasMany
    {
        return $this->hasMany(NotesCommentaire::class, 'id_entreprise');
    }

    public function clientAbonnes(): HasMany
    {
        return $this->hasMany(ClientAbonne::class, 'id_entreprise');
    }
}
