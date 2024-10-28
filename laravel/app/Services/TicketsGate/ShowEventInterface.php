<?php

declare(strict_types=1);

namespace App\Services\TicketsGate;

use Ramsey\Collection\Collection;

interface ShowEventInterface
{
    public function getEvents(int $showId): Collection;
}
