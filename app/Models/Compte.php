<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;

    protected $table = 'comptes';

    protected $fillable = [
        'montant',
        'code'
    ];

    public function client() :BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
