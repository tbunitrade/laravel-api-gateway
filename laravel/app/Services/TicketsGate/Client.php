<?php

declare(strict_types=1);

namespace App\Services\TicketsGate;

class Client
{
    public function __construct(
        protected readonly string $url,
        protected readonly string $authToken
    ){}
}
