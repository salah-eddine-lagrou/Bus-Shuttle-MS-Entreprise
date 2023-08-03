<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $table = 'paiements'; 

    protected $fillable = [
        'methodePaiment',
        'montant',
        'id_abonnement',
        'id_client'
    ];


    public function clients() :BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function abonnements() :BelongsTo
    {
        return $this->belongsTo(Abonnement::class);
    }

    public function coupon_abonnements(): HasMany
    {
        return $this->hasMany(CouponAbonnement::class, 'id_paiement');
    }
}
