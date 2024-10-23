<?php

declare(strict_types=1);

namespace App\Services\TicketsGate;

use App\Services\TicketsGate\Dto\ShowDto;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class Show implements ShowInterface
{
    public function __construct(
        public readonly string $url,
        public readonly string $authToken

    )
    {

    }

    ///public function shows(): ShowDto
    public function shows(): Collection
    {
        $response = Http::withToken($this->authToken)->get($this->url);
        // TODO: Implement shows() method.
    }
}
