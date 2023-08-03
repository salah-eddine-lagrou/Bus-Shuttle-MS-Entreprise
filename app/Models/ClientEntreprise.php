<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientEntreprise extends Model
{
    use HasFactory;

    protected $table = 'client_entreprises';

    protected $fillable = [
        'id_client',
        'id_entreprise'
    ];


    public function entreprise() :BelongsTo
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function client() :BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
