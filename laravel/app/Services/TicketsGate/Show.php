<?php

declare(strict_types=1);

namespace App\Services\TicketsGate;

use App\Services\TicketsGate\Dto\ShowDto;
use Illuminate\Http\Client\ConnectionException;
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

    /**
     * @throws ConnectionException
     */
    public function shows(): Collection
    {
        $response = Http::retry(3,100)
            ->withToken($this->authToken)
            ->dd()
            ->get($this->url.'/shows');


        //decode json array from endpoint
        return collect(json_decode($response->body(), true));
    }
}
