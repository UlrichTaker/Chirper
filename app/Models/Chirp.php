<?php

namespace App\Models;

use App\Events\ChirpCreated; // Importe la classe d'événement ChirpCreated
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    use HasFactory;

    // Les champs qui peuvent être remplis massivement (mass assignable) lors de la création ou de la mise à jour
    protected $fillable = [
        'message',
    ];

    // Les événements qui doivent déclencher des événements
    protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ];

    // Relation Eloquent : Un chirp appartient à un utilisateur
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
        // La méthode belongsTo établit une relation "Appartient-à" avec le modèle User.
    }
}
