<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateAbonnement extends Model
{
    use HasFactory;

    protected $table = 'date_abonnements';

    protected $fillable = [
        'id_abonnement',
        'id_jour'
    ];

    public function jours() :BelongsTo
    {
        return $this->belongsTo(Jour::class);
    }

    public function abonnements() :BelongsTo
    {
        return $this->belongsTo(Abonnement::class);
    }
}
