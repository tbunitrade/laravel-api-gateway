<?php

namespace App\Services\TicketsGate\Dto;

use Carbon\CarbonInterface;

final readonly class ShowEventDto
{
    public function __construct(
        public int $id,
        public string $showId,
        public CarbonInterface $date,
    ){}
}
