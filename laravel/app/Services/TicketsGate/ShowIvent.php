<?php

declare(strict_types=1);

namespace App\Services\TicketsGate;

use App\Services\TicketsGate\Dto\ShowEventDto;

class ShowEvent implements ShowEventInterface
{

    public function getEvents(int $showId): ShowEventDto
    {
        // TODO: Implement getEvents() method.
    }
}
