<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExprimerAbonnement extends Model
{
    use HasFactory;

    protected $table = 'exprimer_abonnements';

    protected $fillable = [
        'depart',
        'destination',
        'description',
        'dislikes',
        'likes',
        'heur_debut_aller',
        'heur_debut_retour',
        'id_client',
        'id_type_abonnement'
    ];

    public function clients(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function type_abonnements(): BelongsTo
    {
        return $this->belongsTo(TypeAbonnement::class);
    }

    public function notes_commentaires(): HasMany
    {
        return $this->hasMany(NotesCommantaire::class, 'id_exprimer_abonnement');
    }
}
