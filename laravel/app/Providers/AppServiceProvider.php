<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\TicketsGate\Dto\ShowDto;
use App\Services\TicketsGate\Show;
use App\Services\TicketsGate\ShowEvent;
use App\Services\TicketsGate\ShowEventInterface;
use App\Services\TicketsGate\ShowInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //$this->app->bind(ShowInterface::class, Show::class);
        $this->app->bind(ShowInterface::class, fn () => new Show(
            config('leadbook.url'),
            config('leadbook.api_key'),
        ));
        $this->app->bind(ShowEventInterface::class, ShowEvent ::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
