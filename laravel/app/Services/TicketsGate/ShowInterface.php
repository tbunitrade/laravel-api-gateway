<?php

declare(strict_types=1);

namespace App\Services\TicketsGate;

use App\Services\TicketsGate\Dto\ShowDto;

interface ShowInterface
{
    public function shows(): ShowDto;
}
