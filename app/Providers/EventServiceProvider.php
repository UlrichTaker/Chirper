<?php

namespace App\Providers;

use App\Events\ChirpCreated;
use App\Listeners\SendChirpCreatedNotifications;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        ChirpCreated::class => [
            SendChirpCreatedNotifications::class,
        ],
        
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        // La méthode boot est appelée lors du démarrage de l'application.
        // Vous pouvez y enregistrer des événements supplémentaires ou effectuer d'autres tâches liées aux événements.
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
        // Cette méthode détermine si Laravel doit automatiquement découvrir les événements et les auditeurs dans votre application.
    }
}
