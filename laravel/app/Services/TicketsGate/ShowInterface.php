<?php

declare(strict_types=1);

namespace App\Services\TicketsGate;

//use App\Services\TicketsGate\Dto\ShowDto;
use Illuminate\Support\Collection;

interface ShowInterface
{
    //public function shows(): ShowDto;

    //we need grab a collection of dto objects
    public function shows(): Collection;
}
