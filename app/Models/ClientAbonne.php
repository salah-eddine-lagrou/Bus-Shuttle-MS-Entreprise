<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAbonne extends Model
{
    use HasFactory;

    protected $table = 'client_abonnes';

    protected $fillable = [
        'id_client',
        'id_abonnement',
        'id_entreprise'
    ];

    public function clients() :BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function abonnements() :BelongsTo
    {
        return $this->belongsTo(Abonnement::class);
    }

    public function entreprises() :BelongsTo
    {
        return $this->belongsTo(Entreprise::class);
    }
}
