<?php

namespace App\Listeners;

use App\Events\ChirpCreated; // Importe la classe d'événement ChirpCreated
use App\Models\User;
use App\Notifications\NewChirp; // Importe la notification NewChirp
use Illuminate\Contracts\Queue\ShouldQueue; // Interface pour les auditeurs asynchrones
use Illuminate\Queue\InteractsWithQueue;

class SendChirpCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        // Le constructeur peut être utilisé pour initialiser des propriétés ou effectuer d'autres actions à la création de l'auditeur.
    }

    /**
     * Handle the event.
     */
    public function handle(ChirpCreated $event): void
    {
        // La méthode handle est appelée lorsque l'événement ChirpCreated est déclenché.

        // Parcours des utilisateurs (à l'aide de cursor pour économiser la mémoire)
        foreach (User::whereNot('id', $event->chirp->user_id)->cursor() as $user) {
            // Pour chaque utilisateur autre que l'utilisateur qui a créé le chirp

            // Envoie une notification NewChirp à chaque utilisateur
            $user->notify(new NewChirp($event->chirp));
        }
    }
}
