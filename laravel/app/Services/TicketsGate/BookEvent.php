<?php

declare(strict_types=1);

namespace App\Services\TicketsGate;

use App\Services\TicketsGate\Dto\BookEventDto;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class BookEvent extends Client implements BookEventInterface
{

    /**
     * @throws ConnectionException
     */
    public function eventReserve(int $eventId, string $name, array $places): BookEventDto
    {
        //dd(array_values($places));

        $response = Http::retry(3,100)
            ->withToken($this->authToken)
            ->post($this->url.'/events/'. $eventId. '/reserve', [
                'name' => $name,
                'places' => array_values($places)
            ]);

        dd($response->body());

        if ($response->ok()) {
            $decodeBody = json_decode($response->body(), true);
            $body = $decodeBody['response'] ?? $decodeBody;
        }

        return new BookEventDto(
            boolval($body['success'] ?? false), $body['reservation_id'] ?? $body['error']);
    }
}
