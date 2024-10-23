<?php

namespace App\Services\TicketsGate\Dto;

use Carbon\CarbonInterface;

final readonly class ShowEventDto
{
    public function __construct(
        private int $id,
        private string $showId,
        private CarbonInterface $date
    )
    {

    }
}
